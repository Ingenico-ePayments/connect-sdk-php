<?php
namespace Ingenico\Connect\Sdk;

/**
 * @group obfuscation
 */
class HttpObfuscatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider rawObfuscatedRequestProvider
     * @param $requestMethod
     * @param $relativeRequestUri
     * @param array $requestHeaders
     * @param string $requestBody
     * @param string $expectedRawObfuscatedRequest
     */
    public function testRawObfuscatedRequest(
        $requestMethod,
        $relativeRequestUri,
        array $requestHeaders,
        $requestBody,
        $expectedRawObfuscatedRequest
    ) {
        $httpObfuscator = new HttpObfuscator();
        $this->assertEquals(
            $expectedRawObfuscatedRequest,
            $httpObfuscator->getRawObfuscatedRequest($requestMethod, $relativeRequestUri, $requestHeaders, $requestBody)
        );
    }

    /**
     * @return array
     */
    public function rawObfuscatedRequestProvider()
    {
        return array(
            array(
                'GET',
                '/foo',
                array(),
                '',
                "GET /foo HTTP/1.1"
            ),
            array(
                'DELETE',
                '/foo',
                array('Content-Type' => 'application/json', 'Authorization' => '123'),
                '',
                "DELETE /foo HTTP/1.1" . PHP_EOL . "Content-Type: application/json" . PHP_EOL . "Authorization: ********"
            ),
            array(
                'POST',
                '/foo',
                array('Content-Type' => 'application/json'),
                json_encode(array('name' => 'bar', 'value' => 'bar'), JSON_PRETTY_PRINT),
                "POST /foo HTTP/1.1" . PHP_EOL . "Content-Type: application/json" . PHP_EOL . PHP_EOL .
                json_encode(array('name' => 'bar', 'value' => '***'), JSON_PRETTY_PRINT)
            ),
            array(
                'PUT',
                '/foo',
                array('Content-Type' => 'application/json', 'Authorization' => '123'),
                json_encode(array('value' => 'baz'), JSON_PRETTY_PRINT),
                "PUT /foo HTTP/1.1" . PHP_EOL . "Content-Type: application/json" . PHP_EOL . "Authorization: ********" . PHP_EOL . PHP_EOL .
                json_encode(array('value' => '***'), JSON_PRETTY_PRINT)
            ),
            array(
                'PUT',
                '/foo',
                array('Content-Type' => 'text/html', 'Authorization' => '123'),
                json_encode(array('value' => 'baz'), JSON_PRETTY_PRINT),
                "PUT /foo HTTP/1.1" . PHP_EOL . "Content-Type: text/html" . PHP_EOL . "Authorization: ********" . PHP_EOL . PHP_EOL .
                json_encode(array('value' => 'baz'), JSON_PRETTY_PRINT)
            ),
        );
    }

    /**
     * @dataProvider rawObfuscatedResponseProvider
     * @param ConnectionResponse $response
     * @param string $expectedRawObfuscatedResponse
     */
    public function testRawObfuscatedResponse(ConnectionResponse $response, $expectedRawObfuscatedResponse)
    {
        $httpObfuscator = new HttpObfuscator();
        $this->assertEquals(
            $expectedRawObfuscatedResponse,
            $httpObfuscator->getRawObfuscatedResponse($response)
        );
    }

    /**
     * @return array
     */
    public function rawObfuscatedResponseProvider()
    {
        return array(
            array(
                new DefaultConnectionResponse(0, array(), ''),
                ""
            ),
            array(
                new DefaultConnectionResponse(
                    200,
                    array(0 => 'HTTP/1.1 200 OK', 'Content-Type' => 'application/json', 'Authorization' => '123'),
                    ''
                ),
                "HTTP/1.1 200 OK" . PHP_EOL . "Content-Type: application/json" . PHP_EOL . "Authorization: ********"
            ),
            array(
                new DefaultConnectionResponse(
                    404,
                    array(0 => 'HTTP/1.1 404 Not Found', 'Content-Type' => 'text/html'),
                    json_encode(array('value' => 'foo'), JSON_PRETTY_PRINT)
                ),
                "HTTP/1.1 404 Not Found" . PHP_EOL . "Content-Type: text/html" . PHP_EOL . PHP_EOL .
                json_encode(array('value' => 'foo'), JSON_PRETTY_PRINT)
            ),
            array(
                new DefaultConnectionResponse(
                    201,
                    array(0 => 'HTTP/1.1 201 Created', 'Content-Type' => 'application/json'),
                    json_encode(array('name' => 'foo', 'value' => 'baz'), JSON_PRETTY_PRINT)
                ),
                "HTTP/1.1 201 Created" . PHP_EOL . "Content-Type: application/json" . PHP_EOL . PHP_EOL .
                json_encode(array('name' => 'foo', 'value' => '***'), JSON_PRETTY_PRINT)
            ),
        );
    }
}
