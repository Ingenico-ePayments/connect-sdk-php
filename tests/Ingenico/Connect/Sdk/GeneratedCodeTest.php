<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;

/**
 * @group generated_code
 *
 */
class GeneratedCodeTest extends TestCase
{
    public function testJsonMarshalling()
    {
        $errorResponse = new ErrorResponse();
        $errorResponse->errorId = '123';
        $apiError = new APIError();
        $apiError->code = '1';
        $apiError->message = 'Test message';
        $apiError->propertyName = 'test';
        $errorResponse->errors = array($apiError);
        $jsonErrorResponse = $errorResponse->toJson();
        $this->assertEquals('{"errorId":"123","errors":[{"code":"1","message":"Test message","propertyName":"test"}]}', $jsonErrorResponse);
        $actualErrorResponse = new ErrorResponse();
        $actualErrorResponse->fromJson($jsonErrorResponse);
        $this->assertEquals($errorResponse, $actualErrorResponse);
    }
}
