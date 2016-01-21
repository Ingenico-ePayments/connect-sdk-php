<?php

/**
 * @group generated_code
 *
 */
class GCS_GeneratedCodeTest extends GCS_ClientTestCase
{
    public function testJsonMarshalling()
    {
        $errorResponse = new GCS_errors_ErrorResponse();
        $errorResponse->errorId = '123';
        $apiError = new GCS_errors_definitions_APIError();
        $apiError->code = '1';
        $apiError->message = 'Test message';
        $apiError->propertyName = 'test';
        $errorResponse->errors = array($apiError);
        $jsonErrorResponse = $errorResponse->toJson();
        $this->assertEquals($jsonErrorResponse, json_encode($errorResponse));
        $actualErrorResponse = new GCS_errors_ErrorResponse();
        $actualErrorResponse->fromJson($jsonErrorResponse);
        $this->assertEquals($errorResponse, $actualErrorResponse);
    }

    public function testCreateSessionsPost()
    {

        $client = $this->getClient();
        $client->setClientMetaInfo('{ "test": "test" }');
        $merchant = $client->merchant('9991');
        $sessionRequest = new GCS_sessions_SessionRequest();
        $sessionRequest->tokens = array('e7303c8c-8b18-4929-9ae9-63d37575c352');
        try {
            $sessions = $merchant->sessions();
            $response = $sessions->create($sessionRequest);
            $this->assertInstanceOf('GCS_sessions_SessionResponse', $response);
        } catch (GCS_InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GCS_GlobalCollectException $e) {
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
        $productQuery = new GCS_Merchant_Products_FindParams();
        $productQuery->amount = 1000;
        $productQuery->currencyCode = 'EUR';
        $productQuery->orderType = 'normal';
        $productQuery->countryCode = 'NL';

        try {
            $result = $merchant->products()->find($productQuery);
            $this->assertInstanceOf('GCS_product_PaymentProducts', $result);
            $paymentProducts = $result->paymentProducts;
            foreach ($paymentProducts as $paymentProduct) {
                $this->assertNotEmpty($paymentProduct->id);
            }
        } catch (GCS_InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GCS_GlobalCollectException $e) {
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
            $this->assertInstanceOf('GCS_Merchant_Products', $result);
        } catch (GCS_InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GCS_GlobalCollectException $e) {
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

        $amountParameters = new GCS_Merchant_Services_ConvertAmountParams();
        $amountParameters->amount = 100;
        $amountParameters->source = 'EUR';
        $amountParameters->target = 'USD';
        try {
            $result = $merchant->services()->convertAmount($amountParameters);
            $this->assertInstanceOf('GCS_services_ConvertAmount', $result);
        } catch (GCS_InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GCS_GlobalCollectException $e) {
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

        $amountParameters = new GCS_Merchant_Services_ConvertAmountParams();
        $amountParameters->amount = 100;
        $amountParameters->source = 'EUR';
        $amountParameters->target = 'USD';
        try {
            $result = $merchant->services()->convertAmount($amountParameters);
            $this->assertInstanceOf('GCS_services_ConvertAmount', $result);
        } catch (GCS_InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GCS_GlobalCollectException $e) {
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
        $body = new GCS_hostedcheckout_CreateHostedCheckoutRequest();
        $body->order = new GCS_payment_definitions_Order();
        $body->order->amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $body->order->amountOfMoney->currencyCode = 'EUR';
        $body->order->amountOfMoney->amount = 2345;
        $body->order->customer = new GCS_payment_definitions_Customer();
        $body->order->customer->billingAddress = new GCS_fei_definitions_Address();
        $body->order->customer->billingAddress->countryCode = 'NL';
        try {
            $result = $merchant->hostedcheckouts()->create($body);
            $this->assertInstanceOf('GCS_hostedcheckout_CreateHostedCheckoutResponse', $result);
        } catch (GCS_InvalidResponseException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GCS_GlobalCollectException $e) {
            print_r($e->getMessage(). PHP_EOL);
            print_r($e->getCode() . PHP_EOL);
            print_r($e->getResponse());
            throw $e;
        } catch (GCS_ReferenceException $e) {
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
        $request = new GCS_token_CreateTokenRequest();

        $request->card = new GCS_token_definitions_TokenCard();
        $request->card->data = new GCS_token_definitions_TokenCardData();
        $request->card->data->cardWithoutCvv = new GCS_fei_definitions_CardWithoutCvv();
        $request->card->data->cardWithoutCvv->cardNumber = '4567350000427977';
        $request->card->data->cardWithoutCvv->expiryDate = '0820';
        $request->card->customer = new GCS_token_definitions_CustomerToken();
        $request->card->customer->billingAddress = new GCS_fei_definitions_Address();
        $request->card->customer->billingAddress->countryCode = 'NL';
        $request->paymentProductId = 1;
        try {
            $createTokenResponse = $merchant->tokens()->create($request);
            $this->assertInstanceOf('GCS_token_CreateTokenResponse', $createTokenResponse);

            $tokenUpdate = new GCS_token_UpdateTokenRequest();
            $tokenUpdate->paymentProductId = 1;
            $tokenUpdate->card = $request->card;
            $tokenUpdate->card->customer->billingAddress->countryCode = 'BE';
            $merchant->tokens()->update($createTokenResponse->token, $tokenUpdate);
            $updateResponse = $merchant->tokens()->get($createTokenResponse->token);
            $this->assertInstanceOf('GCS_token_TokenResponse', $updateResponse);
            $this->assertEquals('BE', $updateResponse->card->customer->billingAddress->countryCode);

            $tokenCancelParameters = new GCS_Merchant_Tokens_DeleteParams();
            $tokenCancelParameters->mandateCancelDate = '20130130';
            $cancel = $merchant->tokens()->delete($createTokenResponse->token, $tokenCancelParameters);
            $this->assertEmpty($cancel);

            try {
                $this->assertEmpty($merchant->tokens()->delete($createTokenResponse->token, $tokenCancelParameters));
            } catch (GCS_ReferenceException $e) {
                $this->assertEquals(404, $e->getHttpStatusCode());
            }

        } catch (GCS_GlobalCollectException $e) {
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
        } catch (GCS_ReferenceException $e) {
            $this->assertInstanceOf('GCS_errors_ErrorResponse', $e->getResponse());
        }

    }
}
