<?php
namespace Ingenico\Connect\Sdk;

use SplTempFileObject;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;

/**
 * @group logging
 */
class SplFileObjectLoggerTest extends \PHPUnit\Framework\TestCase
{
    public function testLog()
    {
        $temp = new SplTempFileObject();
        $logger = new SplFileObjectLogger($temp);
        $message = "test log";
        $logger->log($message);
        // 25 is length of DATE_ATOM
        $temp->fseek(26);
        $content = "";
        while (!$temp->eof()) {
            $content .= $temp->fgets();
        }
        $this->assertEquals($message . PHP_EOL, $content);
    }

    public function testLogException()
    {
        $temp = new SplTempFileObject();
        $logger = new SplFileObjectLogger($temp);
        $message = "test log";
        $exception = new ResponseException(500, new ErrorResponse());
        $logger->logException($message, $exception);
        // 25 is length of DATE_ATOM
        $temp->fseek(26);
        $content = "";
        while (!$temp->eof()) {
            $content .= $temp->fgets();
        }
        $this->assertEquals($message . PHP_EOL . (string) $exception . PHP_EOL, $content);
    }
}
