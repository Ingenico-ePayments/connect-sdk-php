<?php
namespace Ingenico\Connect\Sdk;

/**
 * @group default_connection
 *
 */
class DefaultConnectionResponseTest extends TestCase
{
    public function testGetters()
    {
        $httpStatusCode = 123;
        $headers = array(0 => 'Foo', 'Bar' => 'Baz');
        $body = "Foo Bar\nBáz";
        $connectionReponse = new DefaultConnectionResponse($httpStatusCode, $headers, $body);
        $this->assertEquals($httpStatusCode, $connectionReponse->getHttpStatusCode());
        $this->assertEquals($headers, $connectionReponse->getHeaders());
        $this->assertEquals($body, $connectionReponse->getBody());
        $this->assertEquals('Foo', $connectionReponse->getHeaderValue(0));
        $this->assertEquals('Baz', $connectionReponse->getHeaderValue('Bar'));
        $this->assertEquals('Baz', $connectionReponse->getHeaderValue('bar'));
        $this->assertEquals('', $connectionReponse->getHeaderValue(1));
        $this->assertEquals('', $connectionReponse->getHeaderValue('baz'));
    }
}
