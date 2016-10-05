<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Merchant\Products\FindProductsParams;

/**
 * @group communicator
 *
 */
class CommunicatorTest extends TestCase
{

    const MERCHANT_ID = '8500';

    /** @var Communicator */
    protected $defaultCommunicator = null;

    /** @var ResponseClassMap */
    protected $defaultResponseClassMap = null;

    public function setUp()
    {
        $this->defaultCommunicator = new Communicator(
            new DefaultConnection(),
            $this->getCommunicatorConfiguration()
        );
        $this->defaultResponseClassMap = new ResponseClassMap();
    }

    public function tearDown()
    {
    }
    
    public function testApiRequestNoop()
    {
        new Communicator(new DefaultConnection(), new CommunicatorConfiguration('', '', '', ''));
    }

    public function testConnectionSharing()
    {
        $relativeUri = sprintf('/%s/%s/services/testconnection', Client::API_VERSION, self::MERCHANT_ID);
        $sharedConnection = new DefaultConnection();
        $relativeUri = sprintf('/%s/%s/services/testconnection', Client::API_VERSION, self::MERCHANT_ID);
        $communicator1 = new Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator1->get($this->defaultResponseClassMap, $relativeUri);
        $communicator2 = new Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator2->get($this->defaultResponseClassMap, $relativeUri);
        $this->assertEquals($communicator1->getConnection(), $communicator2->getConnection());
    }


    public function testApiRequestGet()
    {
        $relativeUri = sprintf('/%s/%s/products', Client::API_VERSION, self::MERCHANT_ID);
        $findParams = new FindProductsParams();
        $findParams->countryCode = 'NL';
        $findParams->currencyCode = 'EUR';
        $clientHeaders = [];
        $this->defaultCommunicator->get($this->defaultResponseClassMap, $relativeUri, $clientHeaders, $findParams);
    }

    public function testExceptionInvalidUrl()
    {
        try {
            $relativeUri = sprintf('/%s/%s/foo', Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->get($this->defaultResponseClassMap, $relativeUri);
        } catch (InvalidResponseException $e) {
            $this->assertEquals(404, $e->getResponse()->getHttpStatusCode());
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    public function testApiRequestPost()
    {
        try {
            $relativeUri = sprintf('/%s/%s/payments/1/tokenize', Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->post($this->defaultResponseClassMap, $relativeUri);
        } catch (ReferenceException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestPut()
    {
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->put($this->defaultResponseClassMap, $relativeUri);
        } catch (InvalidResponseException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestDelete()
    {
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', Client::API_VERSION, self::MERCHANT_ID);
            $this->defaultCommunicator->delete($this->defaultResponseClassMap, $relativeUri);
        } catch (ReferenceException $e) {
            return;
        }
        $this->fail();
    }
}
