<?php
namespace Ingenico\Connect\Sdk;

/**
 * @group obfuscation
 */
class CommunicatorLoggerHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider uriProvider
     * @param string $requestUri
     * @param string $endpoint
     * @param string $relativeUriPathWithRequestParameters
     */
    public function testUriSplitting($requestUri, $endpoint, $relativeUriPathWithRequestParameters)
    {
        $communicatorLoggingHelper = new CommunicatorLoggerHelper();
        $this->assertEquals($endpoint, $communicatorLoggingHelper->getEndpoint($requestUri));
        $this->assertEquals(
            $relativeUriPathWithRequestParameters,
            $communicatorLoggingHelper->getRelativeUriPathWithRequestParameters($requestUri)
        );
        $this->assertEquals($requestUri, $endpoint . $relativeUriPathWithRequestParameters);
    }

    /**
     * @return array
     */
    public function uriProvider()
    {
        return array(
            array(
                'https://api-sandbox.globalcollect.com/v1/20000/services/testconnection',
                'https://api-sandbox.globalcollect.com',
                '/v1/20000/services/testconnection',
            ),
            array(
                'https://api-sandbox.globalcollect.com/v1/20000/services/convert/amount?source=EUR&target=USD&amount=1000',
                'https://api-sandbox.globalcollect.com',
                '/v1/20000/services/convert/amount?source=EUR&target=USD&amount=1000',
            ),
            array(
                'https://api-sandbox.globalcollect.com',
                'https://api-sandbox.globalcollect.com',
                ''
            ),
            array(
                '/v1/20000/services/testconnection',
                '',
                '/v1/20000/services/testconnection'
            ),
        );
    }
}
