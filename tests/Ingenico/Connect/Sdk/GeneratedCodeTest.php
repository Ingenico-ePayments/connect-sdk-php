<?php
namespace Ingenico\Connect\Sdk;

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
class GeneratedCodeTest extends ClientTestCase
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
        $this->assertEquals($jsonErrorResponse, json_encode($errorResponse));
        $actualErrorResponse = new ErrorResponse();
        $actualErrorResponse->fromJson($jsonErrorResponse);
        $this->assertEquals($errorResponse, $actualErrorResponse);
    }

    public function testCreateSessionsPost()
    {

        $client = $this->getClient();
        $client->setClientMetaInfo('{ "test": "test" }');
        $merchant = $client->merchant('9991');
        $sessionRequest = new SessionRequest();
        $sessionRequest->tokens = array('e7303c8c-8b18-4929-9ae9-63d37575c352');
        try {
            $sessions = $merchant->sessions();
            $response = $sessions->create($sessionRequest);
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Sessions\SessionResponse', $response);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (Exception $e) {
            print_r($e);
            throw $e;
        }
    }

    public function testMerchant()
    {
        $client = $this->getClient();
        $merchant = $client->merchant('9991');
        $productQuery = new FindProductsParams();
        $productQuery->amount = 1000;
        $productQuery->currencyCode = 'EUR';
        $productQuery->countryCode = 'NL';

        try {
            $result = $merchant->products()->find($productQuery);
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Product\PaymentProducts', $result);
            $paymentProducts = $result->paymentProducts;
            foreach ($paymentProducts as $paymentProduct) {
                $this->assertNotEmpty($paymentProduct->id);
            }
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function testProducts()
    {
        $client = $this->getClient();
        $merchant = $client->merchant(9991);
        try {
            $result = $merchant->products();
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Merchant\Products', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function testConvertAmountGet()
    {
        $client = $this->getClient();
        $client->setClientMetaInfo('{ "test": "test" }');
        $merchant = $client->merchant(9991);

        $amountParameters = new ConvertAmountParams();
        $amountParameters->amount = 100;
        $amountParameters->source = 'EUR';
        $amountParameters->target = 'USD';
        try {
            $result = $merchant->services()->convertAmount($amountParameters);
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Services\ConvertAmount', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function testProxyConvertAmountGet()
    {
        $client = $this->getProxyClient();
        $merchant = $client->merchant(9991);

        $amountParameters = new ConvertAmountParams();
        $amountParameters->amount = 100;
        $amountParameters->source = 'EUR';
        $amountParameters->target = 'USD';
        try {
            $result = $merchant->services()->convertAmount($amountParameters);
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Services\ConvertAmount', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function testHostedCheckout()
    {
        $client = $this->getClient();
        $merchant = $client->merchant(8915);
        $body = new CreateHostedCheckoutRequest();
        $body->order = new Order();
        $body->order->amountOfMoney = new AmountOfMoney();
        $body->order->amountOfMoney->currencyCode = 'EUR';
        $body->order->amountOfMoney->amount = 2345;
        $body->order->customer = new Customer();
        $body->order->customer->billingAddress = new Address();
        $body->order->customer->billingAddress->countryCode = 'NL';
        try {
            $result = $merchant->hostedcheckouts()->create($body);
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Hostedcheckout\CreateHostedCheckoutResponse', $result);
        } catch (InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (ReferenceException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function testCreateUpdateDeleteTokenCardMinimal()
    {
        $client = $this->getClient();
        $merchant = $client->merchant('9991');
        $request = new CreateTokenRequest();

        $request->card = new TokenCard();
        $request->card->data = new TokenCardData();
        $request->card->data->cardWithoutCvv = new CardWithoutCvv();
        $request->card->data->cardWithoutCvv->cardNumber = '4567350000427977';
        $request->card->data->cardWithoutCvv->expiryDate = '0820';
        $request->card->data->cardWithoutCvv->issueNumber = '12';
        $request->card->customer = new CustomerToken();
        $request->card->customer->billingAddress = new Address();
        $request->card->customer->billingAddress->countryCode = 'NL';
        $request->paymentProductId = 1;
        try {
            $createTokenResponse = $merchant->tokens()->create($request);
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse', $createTokenResponse);

            $tokenUpdate = new UpdateTokenRequest();
            $tokenUpdate->paymentProductId = 1;
            $tokenUpdate->card = $request->card;
            $tokenUpdate->card->customer->billingAddress->countryCode = 'BE';
            $merchant->tokens()->update($createTokenResponse->token, $tokenUpdate);
            $updateResponse = $merchant->tokens()->get($createTokenResponse->token);
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Token\TokenResponse', $updateResponse);
            $this->assertEquals('BE', $updateResponse->card->customer->billingAddress->countryCode);

            $tokenCancelParameters = new DeleteTokenParams();
            $tokenCancelParameters->mandateCancelDate = '20130130';
            $cancel = $merchant->tokens()->delete($createTokenResponse->token, $tokenCancelParameters);
            $this->assertEmpty($cancel);

            try {
                $this->assertEmpty($merchant->tokens()->delete($createTokenResponse->token, $tokenCancelParameters));
            } catch (ReferenceException $e) {
                $this->assertEquals(404, $e->getHttpStatusCode());
            }

        } catch (GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        }
    }

    public function testCancelMissingPayment()
    {
        try {
            $client = $this->getClient();
            $merchant = $client->merchant(8910);
            $merchant->payments()->cancel('000000891000000000010000100001');
        } catch (ReferenceException $e) {
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse', $e->getResponse());
        }
    }
}
