<?php
namespace GCS;

/**
 * Class CommunicatorTest
 *
 * @package GCS
 * @group communicator
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
        new Communicator(new DefaultConnection(), new CommunicatorConfiguration('', '', ''));
    }

    public function testConnectionSharing()
    {
        $sharedConnection = new DefaultConnection();
        $communicator1 = new Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator1->get($this->defaultResponseClassMap, '/8500/services/testconnection');
        $communicator2 = new Communicator($sharedConnection, $this->getCommunicatorConfiguration());
        $communicator2->get($this->defaultResponseClassMap, '/8500/services/testconnection');
        $this->assertEquals($communicator1->getConnection(), $communicator2->getConnection());
    }


    public function testApiRequestGet()
    {
        $findParams = new Merchant\Products\FindParams();
        $findParams->countryCode = 'NL';
        $findParams->currencyCode = 'EUR';
        $clientHeaders = [];
        $this->defaultCommunicator->get($this->defaultResponseClassMap, '/8500/products', $clientHeaders, $findParams);
    }

    public function testExceptionInvalidUrl()
    {
        try {
            $this->defaultCommunicator->get($this->defaultResponseClassMap, '/foo/bar');
        } catch (AuthorizationException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestPost()
    {
        try {
            $this->defaultCommunicator->post($this->defaultResponseClassMap, '/8500/payments/1/tokenize');
        } catch (ReferenceException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestPut()
    {
        try {
            $this->defaultCommunicator->put($this->defaultResponseClassMap, '/8500/tokens/1');
        } catch (InvalidResponseException $e) {
            return;
        }
        $this->fail();
    }

    public function testApiRequestDelete()
    {
        try {
            $this->defaultCommunicator->delete($this->defaultResponseClassMap, '/8500/tokens/1');
        } catch (ReferenceException $e) {
            return;
        }
        $this->fail();
    }
}
