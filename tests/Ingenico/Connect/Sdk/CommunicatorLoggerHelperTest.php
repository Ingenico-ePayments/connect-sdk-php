<?php
namespace Ingenico\Connect\Sdk;

/**
 * @group obfuscation
 */
class CommunicatorLoggerHelperTest extends \PHPUnit\Framework\TestCase
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
                'https://eu.sandbox.api-ingenico.com/v1/20000/services/testconnection',
                'https://eu.sandbox.api-ingenico.com',
                '/v1/20000/services/testconnection',
            ),
            array(
                'https://eu.sandbox.api-ingenico.com/v1/20000/services/convert/amount?source=EUR&target=USD&amount=1000',
                'https://eu.sandbox.api-ingenico.com',
                '/v1/20000/services/convert/amount?source=EUR&target=USD&amount=1000',
            ),
            array(
                'https://eu.sandbox.api-ingenico.com',
                'https://eu.sandbox.api-ingenico.com',
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
