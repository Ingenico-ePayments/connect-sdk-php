<?php
namespace Ingenico\Connect\Sdk;

class IdempotenceTest extends TestCase
{
    public function testRequestHeadersWithIdempotenceKey()
    {
        $callContext = new CallContext();
        $requestHeaderGenerator = new RequestHeaderGenerator(
            $this->getCommunicatorConfiguration(),
            'GET',
            'http://example.com',
            '',
            $callContext
        );
        $idempotenceKey = 'test';
        $idempotenceKeyHeaderName = 'X-GCS-Idempotence-Key';
        $authorizationHeaderName = 'Authorization';
        $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
        $this->assertArrayNotHasKey($idempotenceKeyHeaderName, $requestHeaders);
        $this->assertArrayHasKey($authorizationHeaderName, $requestHeaders);
        $authorizationValueWithoutIdempotence = $requestHeaders[$authorizationHeaderName];
        $callContext->setIdempotenceKey('test');
        $requestHeaders = $requestHeaderGenerator->generateRequestHeaders();
        $this->assertArrayHasKey($idempotenceKeyHeaderName, $requestHeaders);
        $this->assertEquals($idempotenceKey, $requestHeaders[$idempotenceKeyHeaderName]);
        $this->assertArrayHasKey($authorizationHeaderName, $requestHeaders);
        $authorizationValueWithIdempotence = $requestHeaders[$authorizationHeaderName];
        $this->assertNotEquals($authorizationValueWithoutIdempotence, $authorizationValueWithIdempotence);
    }

    public function testCreateResponseWithCallContext()
    {
        $callContext = new CallContext();
        $idempotenceKey = 'test';
        $idempotenceRequestTimestamp = '12345';
        $callContext->setIdempotenceKey($idempotenceKey);
        $responseHeaders = array(
            'Content-Type' => 'application/json',
            'X-GCS-Idempotence-Request-Timestamp' => $idempotenceRequestTimestamp
        );
        $responseBody = <<<EOD
{
    "creationOutput": {
        "additionalReference": "00000200002014254946",
        "externalReference": "000002000020142549460000100001"
    },
    "payment": {
        "id": "000002000020142549460000100001",
        "paymentOutput": {
            "amountOfMoney": {
                "amount": 2345,
                "currencyCode": "CAD"
            },
            "references": {
                "paymentReference": "0"
            },
            "paymentMethod": "card",
            "cardPaymentMethodSpecificOutput": {
                "paymentProductId": 1,
                "authorisationCode": "OK1131",
                "card": {
                    "cardNumber": "************9176",
                    "expiryDate": "1220"
                },
                "fraudResults": {
                    "fraudServiceResult": "error",
                    "avsResult": "X",
                    "cvvResult": "M"
                }
            }
        },
        "status": "PENDING_APPROVAL",
        "statusOutput": {
            "isCancellable": true,
            "statusCode": 600,
            "statusCodeChangeDateTime": "20150331120036",
            "isAuthorized": true
        }
    }
}
EOD;
        $response = new DefaultConnectionResponse(201, $responseHeaders, $responseBody);
        $responseFactory = new ResponseFactory();
        $responseFactory->createResponse($response, new ResponseClassMap(), $callContext);
        $this->assertEquals($idempotenceKey, $callContext->getIdempotenceKey());
        $this->assertEquals($idempotenceRequestTimestamp, $callContext->getIdempotenceRequestTimestamp());
    }


    public function testIdempotenceException()
    {
        $callContext = new CallContext();
        $callContext->setIdempotenceKey('test');
        $responseHeaders = array(
            'Content-Type' => 'application/json',
            'X-GCS-Idempotence-Request-Timestamp' => '12345'
        );
        $responseBody = <<<EOD
{
   "errorId" : "75b0f13a-04a5-41b3-83b8-b295ddb23439-000013c6",
   "errors" : [ {
      "code" : "1409",
      "message" : "DUPLICATE REQUEST IN PROGRESS",
      "httpStatusCode" : 409
   } ]
}
EOD;
        $connectionResponse = new DefaultConnectionResponse(409, $responseHeaders, $responseBody);
        $responseFactory = new ResponseFactory();
        $responseExceptionFactory = new ResponseExceptionFactory();
        $exception = $responseExceptionFactory->createException(
            $connectionResponse->getHttpStatusCode(),
            $responseFactory->createResponse($connectionResponse, new ResponseClassMap(), $callContext),
            $callContext
        );
        if (!$exception instanceof IdempotenceException) {
            $this->fail('expected IdempotenceException, but got ' . get_class($exception));
        }
        $this->assertEquals($callContext->getIdempotenceKey(), $exception->getIdempotenceKey());
        $this->assertNotEmpty($exception->getIdempotenceRequestTimestamp());
        $this->assertEquals(
            $callContext->getIdempotenceRequestTimestamp(),
            $exception->getIdempotenceRequestTimestamp()
        );
    }

    public function testReferenceException()
    {
        $callContext = new CallContext();
        $callContext->setIdempotenceKey('test');
        $responseHeaders = array(
            'Content-Type' => 'application/json',
            'X-GCS-Idempotence-Request-Timestamp' => '12345'
        );
        $responseBody = <<<EOD
{
   "errorId" : "75b0f13a-04a5-41b3-83b8-b295ddb23439-000013c6",
   "errors" : [ {
      "code" : "1400",
      "message" : "DUPLICATE REQUEST IN PROGRESS",
      "httpStatusCode" : 409
   } ]
}
EOD;
        $connectionResponse = new DefaultConnectionResponse(409, $responseHeaders, $responseBody);
        $responseFactory = new ResponseFactory();
        $responseExceptionFactory = new ResponseExceptionFactory();
        $exception = $responseExceptionFactory->createException(
            $connectionResponse->getHttpStatusCode(),
            $responseFactory->createResponse($connectionResponse, new ResponseClassMap(), $callContext),
            $callContext
        );
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\ReferenceException', $exception);
    }
}
