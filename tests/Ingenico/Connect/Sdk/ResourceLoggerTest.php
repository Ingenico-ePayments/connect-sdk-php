<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;

/**
 * @group logging
 */
class ResourceLoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testLog()
    {
        $temp = tmpfile();
        $logger = new ResourceLogger($temp);
        $message = "test log";
        $logger->log($message);
        // 25 is length of DATE_ATOM
        fseek($temp, 26);
        $content = fread($temp, 4096);
        $this->assertEquals($message . PHP_EOL, $content);
    }

    public function testLogException()
    {
        $temp = tmpfile();
        $logger = new ResourceLogger($temp);
        $message = "test log";
        $exception = new ResponseException(500, new ErrorResponse());
        $logger->logException($message, $exception);
        // 25 is length of DATE_ATOM
        fseek($temp, 26);
        $content = fread($temp, 4096);
        $this->assertEquals($message . PHP_EOL . (string) $exception . PHP_EOL, $content);
    }
}
