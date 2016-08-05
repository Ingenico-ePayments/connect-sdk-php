<?php

/**
 * @group communicator
 *
 */
class GCS_CommunicatorTest extends GCS_TestCase
{

    const MERCHANT_ID = '8500';

    /** @var GCS_Communicator */
    protected $defaultCommunicator = null;

    /** @var GCS_ResponseClassMap */
    protected $defaultResponseClassMap = null;

    public function setUp()
    {
        $this->defaultCommunicator = new GCS_Communicator(
            new GCS_DefaultConnection(),
            $this->getCommunicatorConfiguration()
        );
        $this->defaultResponseClassMap = new GCS_ResponseClassMap();
    }

    public function tearDown()
    {
    }
    
    public function testApiRequestNoop()
    {
        new GCS_Communicator(new GCS_DefaultConnection(), new GCS_CommunicatorConfiguration('', '', ''));
    }

    public function testConnectionSharing()
    {
        $relativeUri = sprintf('/%s/%s/services/testconnection', GCS_Client::API_VERSION, self::MERCHANT_ID);
        $sharedConnection = new GCS_DefaultConnection();
        $relativeUri = sprintf('/%s/%s/services/testconnection', GCS_Client::API_VERSION, self::MERCHANT_ID);
        $communicator1 = new GCS_Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator1->get($this->defaultResponseClassMap, $relativeUri);
        $communicator2 = new GCS_Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator2->get($this->defaultResponseClassMap, $relativeUri);
        $this->assertEquals($communicator1->getConnection(), $communicator2->getConnection());
    }


    public function testApiRequestGet()
    {
        $relativeUri = sprintf('/%s/%s/products', GCS_Client::API_VERSION, self::MERCHANT_ID);
        $findParams = new GCS_Merchant_Products_FindParams();
        $findParams->countryCode = 'NL';
        $findParams->currencyCode = 'EUR';
        $clientHeaders = [];
        $this->defaultCommunicator->get($this->defaultResponseClassMap, $relativeUri, $clientHeaders, $findParams);
    }

    public function testExceptionInvalidUrl()
    {
        try {
            $relativeUri = sprintf('/%s/%s/foo', GCS_Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->get($this->defaultResponseClassMap, $relativeUri);
        } catch (GCS_InvalidResponseException $e) {
            $this->assertEquals(404, $e->getResponse()->getHttpStatusCode());
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    public function testApiRequestPost()
    {
        try {
            $relativeUri = sprintf('/%s/%s/payments/1/tokenize', GCS_Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->post($this->defaultResponseClassMap, $relativeUri);
        } catch (GCS_ReferenceException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestPut()
    {
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', GCS_Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->put($this->defaultResponseClassMap, $relativeUri);
        } catch (GCS_InvalidResponseException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestDelete()
    {
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', GCS_Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->delete($this->defaultResponseClassMap, $relativeUri);
        } catch (GCS_ReferenceException $e) {
            return;
        }
        $this->fail();
    }
}
