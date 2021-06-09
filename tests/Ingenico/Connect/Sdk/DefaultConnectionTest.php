<?php
namespace Ingenico\Connect\Sdk;

use ErrorException;

/**
 * @group default_connection
 *
 */
class DefaultConnectionTest extends TestCase
{
    /** @var DefaultConnection */
    protected $connection;

    public function setUp()
    {
        parent::setUp();
        $this->connection = new DefaultConnection();
    }

    public function test404WithBareApiEndpoint()
    {
        $responseBuilder = new ResponseBuilder();
        $responseHandler = function ($httpStatusCode, $data, $headers) use ($responseBuilder) {
            $responseBuilder->setHttpStatusCode($httpStatusCode);
            $responseBuilder->setHeaders($headers);
            $responseBuilder->appendBody($data);
        };

        $this->connection->get($this->getApiEndpoint(), [], $responseHandler);
        $this->assertEquals(404, $responseBuilder->getResponse()->getHttpStatusCode());
    }

    public function testTestConnection()
    {
        $responseBuilder = new ResponseBuilder();
        $responseHandler = function ($httpStatusCode, $data, $headers) use ($responseBuilder) {
            $responseBuilder->setHttpStatusCode($httpStatusCode);
            $responseBuilder->setHeaders($headers);
            $responseBuilder->appendBody($data);
        };

        $merchantId = '20000';
        $relativeUriPath = '/' . Client::API_VERSION . '/' . $merchantId . '/services/testconnection';
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $requestHeaderGenerator = new RequestHeaderGenerator($communicatorConfiguration, 'GET', $relativeUriPath);
        $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
        $this->connection->get($this->getApiEndpoint() . $relativeUriPath, $requestHeaders, $responseHandler);
        $response = $responseBuilder->getResponse();
        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertStringStartsWith('application/json', $response->getHeaderValue('Content-Type'));
        $this->assertEquals(array('result' => 'OK'), json_decode($response->getBody(), true));
    }

    public function testCurlErrors()
    {
        $expectedErrorCodeByDomain = array(
            '' => CURLE_URL_MALFORMAT,
            'foo://bar' => CURLE_UNSUPPORTED_PROTOCOL,
            'http://non-existing-domain' => CURLE_COULDNT_RESOLVE_HOST,
            'https://expired.badssl.com' => CURLE_SSL_CACERT
        );
        foreach ($expectedErrorCodeByDomain as $domain => $expectedErrorCode) {
            try {
                $responseHandler = function ($httpStatusCode, $data, $headers) {
                };

                $this->connection->get($domain, [], $responseHandler);
            } catch (ErrorException $e) {
                $expectedErrorMessage = 'cURL error ' . $expectedErrorCode;
                if (function_exists('curl_strerror')) {
                    $expectedErrorMessage .= ' (' . curl_strerror($expectedErrorCode) . ')';
                }
                $this->assertEquals($expectedErrorMessage, $e->getMessage());
                continue;
            }
            $this->fail('An expected exception has not been raised');
        }
    }

    public function testConnectTimeoutExceeded()
    {
        // Without this connect timeout, a cURL error 7 (Couldn't connect to server) is thrown instead
        $this->connection = new DefaultConnection(1, -1);
        try {
            $responseHandler = function ($httpStatusCode, $data, $headers) {
            };
            $startTime = time();
            $this->connection->get('https://www.example.org:12345', [], $responseHandler);
            $this->fail('Expected connect timeout error');
        } catch (ErrorException $e) {
            $endTime = time();
            $expectedErrorMessage1 = 'cURL error ' . CURLE_OPERATION_TIMEOUTED;
            $expectedErrorMessage2 = 'cURL error ' . CURLE_COULDNT_CONNECT;
            if (function_exists('curl_strerror')) {
                $expectedErrorMessage1 .= ' (' . curl_strerror(CURLE_OPERATION_TIMEOUTED) . ')';
                $expectedErrorMessage2 .= ' (' . curl_strerror(CURLE_COULDNT_CONNECT) . ')';
            }
            $expectedErrorMessagePattern = '/' . preg_quote($expectedErrorMessage1) . '|' . preg_quote($expectedErrorMessage2) . '/';
            $this->assertRegExp($expectedErrorMessagePattern, $e->getMessage());
            $this->assertTrue($endTime - $startTime <= 2, 'Connect timeout should occur within 2 seconds');
        }
    }

    public function testReadTimeoutExceeded()
    {
        $this->connection = new DefaultConnection(-1, 1);
        try {
            $responseHandler = function ($httpStatusCode, $data, $headers) {
            };
            $this->connection->get('http://httpbin.org/delay/2', [], $responseHandler);
            $this->fail('Expected read timeout error');
        } catch (ErrorException $e) {
            $expectedErrorMessage = 'cURL error ' . CURLE_OPERATION_TIMEOUTED;
            if (function_exists('curl_strerror')) {
                $expectedErrorMessage .= ' (' . curl_strerror(CURLE_OPERATION_TIMEOUTED) . ')';
            }
            $this->assertEquals($expectedErrorMessage, $e->getMessage());
        }
    }

    /**
     * @dataProvider timeoutAndDelayProvider
     * @param int $timeout
     * @param int $delay
     */
    public function testReadTimeoutNotExceeded($timeout, $delay)
    {
        $this->connection = new DefaultConnection(-1, $timeout);
        $responseBuilder = new ResponseBuilder();
        $responseHandler = function ($httpStatusCode, $data, $headers) use ($responseBuilder) {
            $responseBuilder->setHttpStatusCode($httpStatusCode);
            $responseBuilder->setHeaders($headers);
        };
        $this->connection->get('http://httpbin.org/delay/' . $delay, [], $responseHandler);
        $this->assertEquals(200, $responseBuilder->getResponse()->getHttpStatusCode());
    }

    public function timeoutAndDelayProvider() {
        print "Returning timeouts and delays";
        return array(
            array(-1, 1), // no timeout
            array(0, 1),  // no timeout
            array(2, 1)   // delay < timeout
        );
    }
}
