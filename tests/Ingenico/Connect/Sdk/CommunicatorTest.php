<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Merchant\Products\FindProductsParams;

/**
 * @group communicator
 *
 */
class CommunicatorTest extends TestCase
{

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
        $sharedConnection = new DefaultConnection();
        $relativeUri = sprintf('/%s/%s/services/testconnection', Client::API_VERSION, $this->getMerchantId());
        $communicator1 = new Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator1->get($this->defaultResponseClassMap, $relativeUri);
        $communicator2 = new Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator2->get($this->defaultResponseClassMap, $relativeUri);
        $this->assertEquals($communicator1->getConnection(), $communicator2->getConnection());
    }

    public function testApiRequestGet()
    {
        $relativeUri = sprintf('/%s/%s/products', Client::API_VERSION, $this->getMerchantId());
        $findParams = new FindProductsParams();
        $findParams->countryCode = 'NL';
        $findParams->currencyCode = 'EUR';
        $clientHeaders = [];
        $this->defaultCommunicator->get($this->defaultResponseClassMap, $relativeUri, $clientHeaders, $findParams);
    }

    public function testExceptionInvalidUrl()
    {
        try {
            $relativeUri = sprintf('/%s/%s/foo', Client::API_VERSION, $this->getMerchantId());
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
            $relativeUri = sprintf('/%s/%s/payments/1/tokenize', Client::API_VERSION, $this->getMerchantId());
            $this->defaultCommunicator->post($this->defaultResponseClassMap, $relativeUri);
        } catch (ReferenceException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestPut()
    {
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', Client::API_VERSION, $this->getMerchantId());
            $this->defaultCommunicator->put($this->defaultResponseClassMap, $relativeUri);
        } catch (InvalidResponseException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestDelete()
    {
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', Client::API_VERSION, $this->getMerchantId());
            $this->defaultCommunicator->delete($this->defaultResponseClassMap, $relativeUri);
        } catch (ReferenceException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestGetWithBinaryResponse()
    {
        $bodyHandler = new AppendingBodyHandler();
        $relativeUri = sprintf('/%s/%s/products', Client::API_VERSION, $this->getMerchantId());
        $findParams = new FindProductsParams();
        $findParams->countryCode = 'NL';
        $findParams->currencyCode = 'EUR';
        $clientHeaders = [];
        $this->defaultCommunicator->getWithBinaryResponse($this->defaultResponseClassMap, $relativeUri, $clientHeaders, $findParams, array($bodyHandler, 'handleBodyPart'));
        $this->assertNotEquals('', $bodyHandler->getBody());
        $this->assertStringStartsWith('{', $bodyHandler->getBody());
        $this->assertStringEndsWith('}', $bodyHandler->getBody());
    }

    public function testApiRequestGetWithBinaryResponseWithoutBodyHandler()
    {
        $relativeUri = sprintf('/%s/%s/products', Client::API_VERSION, $this->getMerchantId());
        $findParams = new FindProductsParams();
        $findParams->countryCode = 'NL';
        $findParams->currencyCode = 'EUR';
        $clientHeaders = [];
        $this->defaultCommunicator->getWithBinaryResponse($this->defaultResponseClassMap, $relativeUri, $clientHeaders, $findParams);
    }

    public function testApiRequestPostWithBinaryResponse()
    {
        $bodyHandler = new AppendingBodyHandler();
        try {
            $relativeUri = sprintf('/%s/%s/payments/1/tokenize', Client::API_VERSION, $this->getMerchantId());
            $this->defaultCommunicator->postWithBinaryResponse($this->defaultResponseClassMap, $relativeUri, '', null, null, array($bodyHandler, 'handleBodyPart'));
        } catch (ReferenceException $e) {
            // the body handler is not called
            $this->assertEquals('', $bodyHandler->getBody());
            return;
        }
        $this->fail();
    }

    public function testApiRequestPutWithBinaryResponse()
    {
        $bodyHandler = new AppendingBodyHandler();
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', Client::API_VERSION, $this->getMerchantId());
            $this->defaultCommunicator->putWithBinaryResponse($this->defaultResponseClassMap, $relativeUri, '', null, null, array($bodyHandler, 'handleBodyPart'));
        } catch (InvalidResponseException $e) {
            // the body handler is not called
            $this->assertEquals('', $bodyHandler->getBody());
            return;
        }
        $this->fail();
    }

    public function testApiRequestDeleteWithBinaryResponse()
    {
        $bodyHandler = new AppendingBodyHandler();
        try {
            $relativeUri = sprintf('/%s/%s/tokens/1', Client::API_VERSION, $this->getMerchantId());
            $this->defaultCommunicator->deleteWithBinaryResponse($this->defaultResponseClassMap, $relativeUri, '', null, array($bodyHandler, 'handleBodyPart'));
        } catch (ReferenceException $e) {
            // the body handler is not called
            $this->assertEquals('', $bodyHandler->getBody());
            return;
        }
        $this->fail();
    }
}
