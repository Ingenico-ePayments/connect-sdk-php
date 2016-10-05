<?php
namespace Ingenico\Connect\Sdk;

/**
 * @group obfuscation
 */
class HeaderObfuscatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider headerObfuscatorProvider
     * @param string[] $headers
     * @param string[] $obfuscatedHeaders
     */
    public function testHeaderObfuscator(
        $headers,
        $obfuscatedHeaders
    ) {
        $headerObfuscator = new HeaderObfuscator();
        $this->assertEquals($obfuscatedHeaders, $headerObfuscator->obfuscateHeaders($headers));
    }

    /**
     * @return array
     */
    public function headerObfuscatorProvider()
    {
        return array(
            array(
                array(),array()
            ),
            array(
                array('Authorization' => 'foo'),
                array('Authorization' => '********')
            ),
            array(
                array('authorization' => 'foo'),
                array('authorization' => '********')
            ),
            array(
                array('Authorisation' => 'foo'),
                array('Authorisation' => 'foo')
            ),
            array(
                array('Authorization' => 'foo', 'Content-Type' => 'application/json'),
                array('Authorization' => '********', 'Content-Type' => 'application/json')
            ),
            array(
                array(0 => 'HTTP/1.1 200 OK'),
                array(0 => 'HTTP/1.1 200 OK')
            ),
            array(
                array('Authorization' => array('foo', 'bar')),
                array('Authorization' => array('********', '********'))
            )
        );
    }
}
