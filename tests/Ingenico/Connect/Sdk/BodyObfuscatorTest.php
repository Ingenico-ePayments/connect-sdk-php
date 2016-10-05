<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\BodyObfuscator;

/**
 * @group obfuscation
 */
class BodyObfuscatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider jsonObfuscationProvider
     * @param string $jsonBody
     * @param string $obfuscatedJsonBody
     */
    public function testJsonObfuscation($jsonBody, $obfuscatedJsonBody)
    {
        $bodyObfuscator = new BodyObfuscator();
        $this->assertEquals(
            $obfuscatedJsonBody,
            $bodyObfuscator->obfuscateBody(BodyObfuscator::MIME_APPLICATION_JSON, $jsonBody)
        );
    }

    /**
     * @return array
     */
    public function jsonObfuscationProvider()
    {
        $testObjects = array(
            array(
                null,
                null
            ),
            array(
                true,
                true
            ),
            array(
                false,
                false
            ),
            array(
                123.45,
                123.45
            ),
            array(
                'foo',
                'foo'
            ),
            array(
                'secretkey',
                'secretkey'
            ),
            array(
                array(),
                array()
            ),
            array(
                array('foo'),
                array('foo')
            ),
            array(
                (object) array(),
                (object) array()
            ),
            array(
                (object) array('foo'),
                (object) array('foo')
            ),
            array(
                array('name' => 'foo'),
                array('name' => 'foo')
            ),
            array(
                array('secretKey' => 'foo'),
                array('secretKey' => '********')
            ),
            array(
                array('value' => 'foo'),
                array('value' => '***')
            ),
            array(
                array('bin' => '1234567890'),
                array('bin' => '123456****')
            ),
            array(
                array('iban' => 'NL12ABCD1234567890'),
                array('iban' => '**************7890')
            ),
            array(
                array('cardNumber' => '1234567890123456'),
                array('cardNumber' => '************3456')
            ),
            array(
                array('expiryDate' => '1234'),
                array('expiryDate' => '**34')
            ),
            array(
                array('fields' => array(array('name' => 'foo'), array('value' => 'foo'))),
                array('fields' => array(array('name' => 'foo'), array('value' => '***')))
            )
        );
        return array_map(function (array $testObjectValues) {
            return array_map(function ($testObjectValue) {
                return json_encode($testObjectValue, JSON_PRETTY_PRINT);
            }, $testObjectValues);
        }, $testObjects);
    }

    /**
     * @dataProvider skipObfuscationProvider
     * @param string $contentType
     * @param string $value
     */
    public function testSkipObfuscation($contentType, $value)
    {
        $bodyObfuscator = new BodyObfuscator();
        $this->assertEquals($value, $bodyObfuscator->obfuscateBody($contentType, $value));
    }

    /**
     * @return array
     */
    public function skipObfuscationProvider()
    {
        return array(
            array(BodyObfuscator::MIME_APPLICATION_JSON, 'foo'),
            array(BodyObfuscator::MIME_APPLICATION_JSON, '{'),
            array('text/html', ''),
            array('text/html', 'foo'),
            array('text/html', '{'),
            array('text/html', '{"foo": "bar"'),
            array('', '')
        );
    }
}
