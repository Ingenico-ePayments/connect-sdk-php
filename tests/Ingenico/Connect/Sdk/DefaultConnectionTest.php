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
        $response = $this->connection->get($this->getApiEndpoint(), []);
        $this->assertEquals(404, $response->getHttpStatusCode());
    }

    public function testTestConnection()
    {
        $merchantId = '20000';
        $relativeUriPath = '/' . Client::API_VERSION . '/' . $merchantId  . '/services/testconnection';
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $requestHeaderGenerator = new RequestHeaderGenerator($communicatorConfiguration, 'GET', $relativeUriPath);
        $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
        $response = $this->connection->get($this->getApiEndpoint() . $relativeUriPath, $requestHeaders);
        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertEquals('application/json', $response->getHeaderValue('Content-Type'));
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
                $this->connection->get($domain, []);
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
}
