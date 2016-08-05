<?php

/**
 * @group logging
 */
class GCS_ClientLoggingTest extends PHPUnit_Framework_TestCase
{
    public function testEnableLoggingCascade()
    {
        $logger = $this->getMock('GCS_CommunicatorLogger');
        $communicator = $this->getMockBuilder('GCS_Communicator')->disableOriginalConstructor()->getMock();
        $communicator->expects($this->once())->method('enableLogging')->with($this->equalTo($logger));
        $communicator->expects($this->never())->method('disableLogging');
        /** @var GCS_Communicator $communicator */
        $client = new GCS_Client($communicator);
        /** @var GCS_CommunicatorLogger $logger */
        $client->enableLogging($logger);
    }

    public function testDisableLoggingCascade()
    {
        $communicator = $this->getMockBuilder('GCS_Communicator')->disableOriginalConstructor()->getMock();
        $communicator->expects($this->once())->method('disableLogging');
        $communicator->expects($this->never())->method('enableLogging');
        /** @var GCS_Communicator $communicator */
        $client = new GCS_Client($communicator);
        $client->disableLogging();
    }

    public function testMultipleEnableAndDisableLoggingCascades()
    {
        $logger = $this->getMock('GCS_CommunicatorLogger');
        $communicator = $this->getMockBuilder('GCS_Communicator')->disableOriginalConstructor()->getMock();
        $communicator->expects($this->exactly(3))->method('enableLogging')->with($this->equalTo($logger));
        $communicator->expects($this->exactly(2))->method('disableLogging');
        /** @var GCS_Communicator $communicator */
        $client = new GCS_Client($communicator);
        /** @var GCS_CommunicatorLogger $logger */
        $client->enableLogging($logger);
        $client->enableLogging($logger);
        $client->disableLogging();
        $client->disableLogging();
        $client->enableLogging($logger);
    }
}
