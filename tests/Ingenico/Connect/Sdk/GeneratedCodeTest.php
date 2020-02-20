<?php
namespace Ingenico\Connect\Sdk;

use Exception;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\CardWithoutCvv;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\CreateHostedCheckoutRequest;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Customer;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;
use Ingenico\Connect\Sdk\Domain\Sessions\SessionRequest;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\UpdateTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\CustomerToken;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenCard;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenCardData;
use Ingenico\Connect\Sdk\Merchant\Products\FindProductsParams;
use Ingenico\Connect\Sdk\Merchant\Services\ConvertAmountParams;
use Ingenico\Connect\Sdk\Merchant\Tokens\DeleteTokenParams;

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
