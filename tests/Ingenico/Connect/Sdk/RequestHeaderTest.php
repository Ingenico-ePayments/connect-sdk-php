<?php
namespace Ingenico\Connect\Sdk;

use Exception;
use Ingenico\Connect\Sdk\CommunicatorConfiguration;
use Ingenico\Connect\Sdk\Domain\MetaData\ShoppingCartExtension;

/**
 * @group request_header
 *
 */
class RequestHeaderTest extends TestCase
{

    public function testV1HMAC()
    {
        foreach (array('GET','POST','PUT','DELETE') as $httpMethod) {
            $requestHeaderGenerator = new RequestHeaderGenerator(
                $this->getCommunicatorConfiguration(),
                $httpMethod,
                '/v1/consumer/ANDR%C3%89E/?q=na%20me'
            );
            $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
            $httpHeaderHelper = new HttpHeaderHelper();
            $curlHeaders = $httpHeaderHelper->generateRawHeaders($requestHeaders);

            $this->assertCount(4, $curlHeaders);

            $result = false;
            foreach ($curlHeaders as $curlHeader) {
                $result |= preg_match(
                    '/^Authorization: GCS v1HMAC:' . $this->getApiKey() . ':[a-zA-Z0-9+\/]+={0,2}/',
                    $curlHeader
                );
            }
            $this->assertEquals(true, $result);
        }
    }

    public function testAddHeaderV1HMACAddHeaders()
    {
        foreach (array('GET','POST','PUT','DELETE') as $httpMethod) {
            $clientMetaInfo = base64_encode('{ "test": "test" }');
            $requestHeaderGenerator = new RequestHeaderGenerator(
                $this->getCommunicatorConfiguration(),
                $httpMethod,
                '/v1/consumer/ANDR%C3%89E/?q=na%20me',
                $clientMetaInfo
            );

            $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();

            $this->assertCount(5, $requestHeaders);
            $result = false;
            foreach ($requestHeaders as $curlHeader) {
                $splitHeader = explode(':', $curlHeader);
                $result |= base64_encode(base64_decode(end($splitHeader))) == end($splitHeader);
            }
            if (!$result) {
                print_r($requestHeaders);
            }
            $this->assertEquals(true, $result);

            $xGcsHeaders = array_slice($requestHeaders, 1, 3, true);
            $xGcsHeadersSorted = $xGcsHeaders;
            ksort($xGcsHeadersSorted);
            $this->assertEquals($xGcsHeadersSorted, $xGcsHeaders);
        }
    }

    /**
     * @expectedException     Exception
     */
    public function testException()
    {
        new RequestHeaderGenerator(
            $this->getCommunicatorConfiguration(),
            'INVALID',
            '/v1/consumer/ANDR%C3%89E/?q=na%20me'
        );
    }

    public function testMultiLineHeader()
    {
        $gcsHeaderValue = " some value  \r\n \n with  some \r\n \t spaces ";
        $gcsEncodedHeaderValue = trim(preg_replace('/\r?\n[\h]*/', ' ', $gcsHeaderValue));
        $this->assertEquals('some value    with  some  spaces', $gcsEncodedHeaderValue);
    }

    public function testServerMetaInfoHeaderSimple()
    {
        $requestHeaderGenerator = new RequestHeaderGenerator(
            $this->getCommunicatorConfiguration(),
            'GET',
            '/v1/consumer/ANDR%C3%89E/?q=na%20me'
        );
        $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
        $serverMetaInfoJson = $requestHeaders['X-GCS-ServerMetaInfo'];
        $serverMetaInfo = json_decode(base64_decode($serverMetaInfoJson));
        $this->assertInstanceOf('\stdClass', $serverMetaInfo);

        $this->assertObjectHasAttribute('platformIdentifier', $serverMetaInfo);
        $this->assertContains(php_uname(), $serverMetaInfo->platformIdentifier);
        $this->assertContains(phpversion(), $serverMetaInfo->platformIdentifier);

        $this->assertObjectHasAttribute('sdkIdentifier', $serverMetaInfo);
        $this->assertEquals('PHPServerSDK/v' . RequestHeaderGenerator::SDK_VERSION, $serverMetaInfo->sdkIdentifier);

        $this->assertObjectHasAttribute('sdkCreator', $serverMetaInfo);
        $this->assertEquals('Ingenico', $serverMetaInfo->sdkCreator);

        $this->assertObjectHasAttribute('integrator', $serverMetaInfo);
        $this->assertEquals('Ingenico', $serverMetaInfo->integrator);

        $this->assertObjectNotHasAttribute('shoppingCartExtension', $serverMetaInfo);
    }

    public function testServerMetaInfoHeaderFull()
    {
        // create a new CommunicatorConfiguration to not modify the field
        $communicatorConfiguration = new CommunicatorConfiguration(
            $this->getApiKey(),
            $this->getApiSecret(),
            $this->getApiEndpoint(),
            'Ingenico.Integrator'
        );
        $communicatorConfiguration->setShoppingCartExtension(new ShoppingCartExtension('Ingenico.Creator', 'Extension', '1.0'));

        $requestHeaderGenerator = new RequestHeaderGenerator(
            $communicatorConfiguration,
            'GET',
            '/v1/consumer/ANDR%C3%89E/?q=na%20me'
        );
        $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
        $serverMetaInfoJson = $requestHeaders['X-GCS-ServerMetaInfo'];
        $serverMetaInfo = json_decode(base64_decode($serverMetaInfoJson));
        $this->assertInstanceOf('\stdClass', $serverMetaInfo);

        $this->assertObjectHasAttribute('platformIdentifier', $serverMetaInfo);
        $this->assertContains(php_uname(), $serverMetaInfo->platformIdentifier);
        $this->assertContains(phpversion(), $serverMetaInfo->platformIdentifier);

        $this->assertObjectHasAttribute('sdkIdentifier', $serverMetaInfo);
        $this->assertEquals('PHPServerSDK/v' . RequestHeaderGenerator::SDK_VERSION, $serverMetaInfo->sdkIdentifier);

        $this->assertObjectHasAttribute('sdkCreator', $serverMetaInfo);
        $this->assertEquals('Ingenico', $serverMetaInfo->sdkCreator);

        $this->assertObjectHasAttribute('integrator', $serverMetaInfo);
        $this->assertEquals('Ingenico.Integrator', $serverMetaInfo->integrator);

        $this->assertObjectHasAttribute('shoppingCartExtension', $serverMetaInfo);
        $this->assertInstanceOf('\stdClass', $serverMetaInfo->shoppingCartExtension);

        $this->assertObjectHasAttribute('creator', $serverMetaInfo->shoppingCartExtension);
        $this->assertEquals('Ingenico.Creator', $serverMetaInfo->shoppingCartExtension->creator);
        $this->assertObjectHasAttribute('name', $serverMetaInfo->shoppingCartExtension);
        $this->assertEquals('Extension', $serverMetaInfo->shoppingCartExtension->name);
        $this->assertObjectHasAttribute('version', $serverMetaInfo->shoppingCartExtension);
        $this->assertEquals('1.0', $serverMetaInfo->shoppingCartExtension->version);
    }
}
