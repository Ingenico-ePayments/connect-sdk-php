<?php

/**
 * @group communicator
 *
 */
class GCS_CommunicatorTest extends GCS_TestCase
{
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
        $sharedConnection = new GCS_DefaultConnection();
        $communicator1 = new GCS_Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator1->get($this->defaultResponseClassMap, '/8500/services/testconnection');
        $communicator2 = new GCS_Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator2->get($this->defaultResponseClassMap, '/8500/services/testconnection');
        $this->assertEquals($communicator1->getConnection(), $communicator2->getConnection());
    }


    public function testApiRequestGet()
    {
        $findParams = new GCS_Merchant_Products_FindParams();
        $findParams->countryCode = 'NL';
        $findParams->currencyCode = 'EUR';
        $clientHeaders = [];
        $this->defaultCommunicator->get($this->defaultResponseClassMap, '/8500/products', $clientHeaders, $findParams);
    }

    public function testExceptionInvalidUrl()
    {
        try {
            $this->defaultCommunicator->get($this->defaultResponseClassMap, '/foo/bar');
        } catch (GCS_AuthorizationException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestPost()
    {
        try {
            $this->defaultCommunicator->post($this->defaultResponseClassMap, '/8500/payments/1/tokenize');
        } catch (GCS_ReferenceException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestPut()
    {
        try {
            $this->defaultCommunicator->put($this->defaultResponseClassMap, '/8500/tokens/1');
        } catch (GCS_InvalidResponseException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestDelete()
    {
        try {
            $this->defaultCommunicator->delete($this->defaultResponseClassMap, '/8500/tokens/1');
        } catch (GCS_ReferenceException $e) {
            return;
        }
        $this->fail();
    }
}
