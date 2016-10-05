<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Client;
use Ingenico\Connect\Sdk\Communicator;
use Ingenico\Connect\Sdk\CommunicatorLogger;

/**
 * @group logging
 */
class ClientLoggingTest extends \PHPUnit_Framework_TestCase
{
    public function testEnableLoggingCascade()
    {
        $logger = $this->getMock('\Ingenico\Connect\Sdk\CommunicatorLogger');
        $communicator = $this->getMockBuilder('\Ingenico\Connect\Sdk\Communicator')->disableOriginalConstructor()->getMock();
        $communicator->expects($this->once())->method('enableLogging')->with($this->equalTo($logger));
        $communicator->expects($this->never())->method('disableLogging');
        /** @var Communicator $communicator */
        $client = new Client($communicator);
        /** @var CommunicatorLogger $logger */
        $client->enableLogging($logger);
    }

    public function testDisableLoggingCascade()
    {
        $communicator = $this->getMockBuilder('\Ingenico\Connect\Sdk\Communicator')->disableOriginalConstructor()->getMock();
        $communicator->expects($this->once())->method('disableLogging');
        $communicator->expects($this->never())->method('enableLogging');
        /** @var Communicator $communicator */
        $client = new Client($communicator);
        $client->disableLogging();
    }

    public function testMultipleEnableAndDisableLoggingCascades()
    {
        $logger = $this->getMock('\Ingenico\Connect\Sdk\CommunicatorLogger');
        $communicator = $this->getMockBuilder('\Ingenico\Connect\Sdk\Communicator')->disableOriginalConstructor()->getMock();
        $communicator->expects($this->exactly(3))->method('enableLogging')->with($this->equalTo($logger));
        $communicator->expects($this->exactly(2))->method('disableLogging');
        /** @var Communicator $communicator */
        $client = new Client($communicator);
        /** @var CommunicatorLogger $logger */
        $client->enableLogging($logger);
        $client->enableLogging($logger);
        $client->disableLogging();
        $client->disableLogging();
        $client->enableLogging($logger);
    }
}
