<?php

/**
 * @group request_header
 *
 */
class GCS_RequestHeaderTest extends GCS_TestCase
{

    public function testV1HMAC()
    {
        foreach (array('GET','POST','PUT','DELETE') as $httpMethod) {
            $requestHeaderGenerator = new GCS_RequestHeaderGenerator(
                $this->getCommunicatorConfiguration(),
                $httpMethod,
                '/v1/consumer/ANDR%C3%89E/?q=na%20me'
            );
            $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
            $httpHeaderHelper = new GCS_HttpHeaderHelper();
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
            $requestHeaderGenerator = new GCS_RequestHeaderGenerator(
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
        new GCS_RequestHeaderGenerator(
            $this->getCommunicatorConfiguration(),
            'INVALID',
            '/v1/consumer/ANDR%C3%89E/?q=na%20me'
        );
    }
}
