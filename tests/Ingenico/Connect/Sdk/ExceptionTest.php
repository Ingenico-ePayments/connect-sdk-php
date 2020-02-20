<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Definitions\Card;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payment\CreatePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CardPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Customer;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalInformation;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalName;
use Ingenico\Connect\Sdk\Domain\Payout\CreatePayoutRequest;
use Ingenico\Connect\Sdk\Domain\Payout\PayoutErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutCustomer;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutReferences;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult;
use Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult;
use Ingenico\Connect\Sdk\Domain\Services\GetIINDetailsRequest;

/**
 * @group exceptions
 */
class Client_ExceptionTest extends ClientTestCase
{
    public function testExceptionWithoutErrors()
    {
        $responseException = new ResponseException(0, new ErrorResponse());
        $this->assertEmpty($responseException->getErrorId());
        $this->assertCount(0, $responseException->getErrors());
    }

    public function testExceptionStringRepresentation()
    {
        $httpStatusCode = 400;
        $errorResponseJsonString = <<<'EOD'
{
    "errorId": "8a41a5dd-7366-4026-a41b-e98c56808edd",
    "errors": [
        {
            "category": "CONNECT_PLATFORM_ERROR",
            "code": "20000000",
            "httpStatusCode": 400,
            "id": "PARAMETER_NOT_FOUND_IN_REQUEST",
            "message": "The parameter shown above was not found in the request received by connect.",
            "propertyName": "bin",
            "requestId": ""
        }
    ]
}
EOD;
        $errorResponse = new ErrorResponse();
        $errorResponse->fromJson($errorResponseJsonString);
        $responseException = new ResponseException($httpStatusCode, $errorResponse);
        $expectedResponseExceptionString = sprintf(
            "exception '%s' with message '%s'. in %s:%d\nHTTP status code: %s\nResponse:\n%s\nStack trace:\n%s",
            'Ingenico\Connect\Sdk\ResponseException',
            $responseException->getMessage(),
            $responseException->getFile(),
            $responseException->getLine(),
            $httpStatusCode,
            $errorResponseJsonString,
            $responseException->getTraceAsString()
        );
        // replace Windows \r\n with Unix \n before comparing
        $this->assertEquals(str_replace("\r\n", "\n", $expectedResponseExceptionString), str_replace("\r\n", "\n", (string) $responseException));
    }


    public function testValidationException()
    {
        try {
            $emptyBody = new GetIINDetailsRequest();
            $this->getClient()->merchant($this->getMerchantId())->services()->getIINdetails($emptyBody);
        } catch (ValidationException $e) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testDeclinedPaymentException()
    {
        $paymentErrorResponse = new PaymentErrorResponse();
        $declinedPaymentException = new DeclinedPaymentException(0, $paymentErrorResponse);
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult', $declinedPaymentException->getPaymentResult());
        $paymentErrorResponse->paymentResult = new CreatePaymentResult();
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult', $declinedPaymentException->getPaymentResult());
    }

    public function testDeclinedPayoutException()
    {
        $payoutErrorResponse = new PayoutErrorResponse();
        $declinedPayoutException = new DeclinedPayoutException(0, $payoutErrorResponse);
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult', $declinedPayoutException->getPayoutResult());
        $payoutErrorResponse->payoutResult = new PayoutResult();
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult', $declinedPayoutException->getPayoutResult());
    }

    public function testDeclinedRefundException()
    {
        $refundErrorResponse = new RefundErrorResponse();
        $declinedRefundException = new DeclinedRefundException(0, $refundErrorResponse);
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult', $declinedRefundException->getRefundResult());
        $refundErrorResponse->refundResult = new RefundResult();
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult', $declinedRefundException->getRefundResult());
    }
}
