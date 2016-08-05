<?php

/**
 * @group logging
 */

class GCS_CommunicatorLoggingTest extends PHPUnit_Framework_TestCase
{
    public function testOnlyLogWhileLoggingIsEnabled()
    {
        $connection = $this->getMock('GCS_Connection');
        $connection->method('get')->willReturn(
            $this->getMockConnectionResponse(200, array('Content-Type' => 'application/json'), '{}')
        );
        /** @var GCS_Connection $connection */
        $communicator = new GCS_Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $logger = $this->getMock('GCS_CommunicatorLogger');
        $logger->expects($this->exactly(2))->method('log')->will(
            $this->returnCallback(function ($message) {
                $messageParts = explode("\n", $message);
                $this->assertGreaterThanOrEqual(2, count($messageParts));
                if (strpos($messageParts[0], 'Outgoing request') === 0) {
                    $this->assertContains('/bar', $messageParts[1]);
                }
            })
        );
        $logger->expects($this->never())->method('logException');
        /** @var GCS_CommunicatorLogger $logger */
        $responseClassMap = $this->getMock('GCS_ResponseClassMap');
        /** @var GCS_ResponseClassMap $responseClassMap */
        $communicator->get($responseClassMap, '/foo');
        $communicator->enableLogging($logger);
        $communicator->get($responseClassMap, '/bar');
        $communicator->disableLogging();
        $communicator->get($responseClassMap, '/baz');
    }

    public function testLoggingForSuccessResponse()
    {
        $relativeRequestUri = '/foo/bar';
        $connection = $this->getMock('GCS_Connection');
        $connection->method('post')->willReturn(
            $this->getMockConnectionResponse(200, array('Content-Type' => 'application/json'), '{}')
        );
        /** @var GCS_Connection $connection */
        $communicator = new GCS_Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($communicator);
        $relativeRequestUriWithRequestParameters = $relativeRequestUri;
        $requestHeaders =
            $this->getCommunicatorRequestHeaders($communicator, 'POST', $relativeRequestUriWithRequestParameters);
        $requestBody = $this->getMockRequestDataObject();
        $httpObfuscator = new GCS_HttpObfuscator();
        $rawObfuscatedRequest = $httpObfuscator->getRawObfuscatedRequest(
            'POST',
            $relativeRequestUriWithRequestParameters,
            $requestHeaders,
            $requestBody->toJson()
        );
        $logger = $this->getMock('GCS_CommunicatorLogger');
        $logger->expects($this->exactly(2))->method('log')->will(
            $this->returnCallback(function ($message) use ($uuidGenerator, $rawObfuscatedRequest) {
                $messageHeader = strstr($message, "\n", true);
                $this->assertNotEmpty($uuidGenerator->getLastGeneratedUuid());
                $this->assertContains($uuidGenerator->getLastGeneratedUuid(), $messageHeader);
                if (strpos($messageHeader, 'Outgoing request') === 0) {
                    $this->assertEquals(trim(strstr($message, "\n")), $rawObfuscatedRequest);
                }
            })
        );
        $logger->expects($this->never())->method('logException');
        /** @var GCS_CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('GCS_ResponseClassMap');
        /** @var GCS_ResponseClassMap $responseClassMap */
        $communicator->post($responseClassMap, $relativeRequestUri, '', $requestBody);
    }

    public function testLoggingForClientErrorResponse()
    {
        $relativeRequestUri = '/foo/bar';
        $responseHeaders = array('Content-Type' => 'application/json');
        $errorResponse = $this->getErrorResponseDataObject();
        $connectionResponse = $this->getMockConnectionResponse(400, $responseHeaders, $errorResponse->toJson());
        $connection = $this->getMock('GCS_Connection');
        $connection->method('put')->willReturn($connectionResponse);
        /** @var GCS_Connection $connection */
        $communicator = new GCS_Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($communicator);
        $httpObfuscator = new GCS_HttpObfuscator();
        $rawObfuscatedResponse = $httpObfuscator->getRawObfuscatedResponse($connectionResponse);
        $logger = $this->getMock('GCS_CommunicatorLogger');
        $logger->expects($this->exactly(2))->method('log')->will(
            $this->returnCallback(function ($message) use ($uuidGenerator, $rawObfuscatedResponse) {
                $messageHeader = strstr($message, "\n", true);
                $this->assertNotEmpty($uuidGenerator->getLastGeneratedUuid());
                $this->assertContains($uuidGenerator->getLastGeneratedUuid(), $messageHeader);
                if (strpos($messageHeader, 'Incoming response') === 0) {
                    $this->assertEquals(trim(strstr($message, "\n")), $rawObfuscatedResponse);
                }
            })
        );
        $logger->expects($this->never())->method('logException');
        /** @var GCS_CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('GCS_ResponseClassMap');
        /** @var GCS_ResponseClassMap $responseClassMap */
        try {
            $communicator->put($responseClassMap, $relativeRequestUri);
        } catch (GCS_ResponseException $e) {
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    public function testLoggingForInvalidResponse()
    {
        $relativeRequestUri = '/foo/bar';
        $responseHeaders = array('Content-Type' => 'text/html');
        $responseBody = 'an error occurred';
        $connectionResponse = $this->getMockConnectionResponse(400, $responseHeaders, $responseBody);
        $connection = $this->getMock('GCS_Connection');
        $connection->method('get')->willReturn($connectionResponse);
        /** @var GCS_Connection $connection */
        $communicator = new GCS_Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($communicator);
        $httpObfuscator = new GCS_HttpObfuscator();
        $rawObfuscatedResponse = $httpObfuscator->getRawObfuscatedResponse($connectionResponse);
        $logger = $this->getMock('GCS_CommunicatorLogger');
        $logger->expects($this->exactly(2))->method('log')->will(
            $this->returnCallback(function ($message) use ($uuidGenerator, $rawObfuscatedResponse) {
                $messageHeader = strstr($message, "\n", true);
                $this->assertNotEmpty($uuidGenerator->getLastGeneratedUuid());
                $this->assertContains($uuidGenerator->getLastGeneratedUuid(), $messageHeader);
                if (strpos($messageHeader, 'Incoming response') === 0) {
                    $this->assertEquals(trim(strstr($message, "\n")), $rawObfuscatedResponse);
                }
            })
        );
        $logger->expects($this->never())->method('logException');
        /** @var GCS_CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('GCS_ResponseClassMap');
        /** @var GCS_ResponseClassMap $responseClassMap */
        try {
            $communicator->get($responseClassMap, $relativeRequestUri);
        } catch (GCS_InvalidResponseException $e) {
            $this->assertEquals($connectionResponse, $e->getResponse());
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    public function testLoggingForCommunicationException()
    {
        $relativeRequestUri = '/foo/bar';
        $errorException = new ErrorException('Test error exception');
        $connection = $this->getMock('GCS_Connection');
        $connection->method('delete')->willThrowException($errorException);
        /** @var GCS_Connection $connection */
        $communicator = new GCS_Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($communicator);
        $logger = $this->getMock('GCS_CommunicatorLogger');
        $logger->expects($this->once())->method('log')->will(
            $this->returnCallback(function ($message) use ($uuidGenerator) {
                $messageHeader = strstr($message, "\n", true);
                $this->assertNotEmpty($uuidGenerator->getLastGeneratedUuid());
                $this->assertContains($uuidGenerator->getLastGeneratedUuid(), $messageHeader);
            })
        );
        $logger->expects($this->once())->method('logException')->will(
            $this->returnCallback(function ($message, $exception) use ($uuidGenerator, $errorException) {
                $this->assertNotContains("\n", $message);
                $this->assertNotEmpty($uuidGenerator->getLastGeneratedUuid());
                $this->assertContains($uuidGenerator->getLastGeneratedUuid(), $message);
                $this->assertEquals($errorException, $exception);
            })
        );
        /** @var GCS_CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('GCS_ResponseClassMap');
        /** @var GCS_ResponseClassMap $responseClassMap */
        try {
            $communicator->delete($responseClassMap, $relativeRequestUri);
        } catch (ErrorException $e) {
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    /**
     * @param int $httpStatusCode
     * @param string[] $headers
     * @param string $body
     * @return GCS_ConnectionResponse
     */
    protected function getMockConnectionResponse($httpStatusCode, $headers = array(), $body = '{}')
    {
        $connectionResponse = $this->getMock('GCS_ConnectionResponse');
        $connectionResponse->method('getHttpStatusCode')->willReturn($httpStatusCode);
        $connectionResponse->method('getHeaders')->willReturn($headers);
        $returnMap = array();
        foreach ($headers as $key => $value) {
            $returnMap[] = array($key, $value);
        }
        $connectionResponse->method('getHeaderValue')->willReturnMap($returnMap);
        $connectionResponse->method('getBody')->willReturn($body);
        return $connectionResponse;
    }

    /**
     * @return GCS_CommunicatorConfiguration
     */
    protected function getMockCommunicatorConfiguration()
    {
        return $this->getMockBuilder('GCS_CommunicatorConfiguration')->disableOriginalConstructor()->getMock();
    }

    /**
     * @return GCS_DataObject
     */
    protected function getMockRequestDataObject()
    {
        $requestDataObject = $this->getMock('GCS_DataObject');
        $convertedDataObject = new stdClass();
        $convertedDataObject->customer = new stdClass();
        $convertedDataObject->customer->firstName = 'John';
        $convertedDataObject->customer->lastname = 'Doe';
        $convertedDataObject->accountNumber = '1234567890';
        $requestDataObject->method('toObject')->willReturn($convertedDataObject);
        $requestDataObject->method('toJson')->willReturn(json_encode($convertedDataObject));
        return $requestDataObject;
    }

    /**
     * @return GCS_DataObject
     */
    protected function getErrorResponseDataObject()
    {
        $errorResponse = new GCS_errors_ErrorResponse();
        $errorResponse->errorId = '123;';
        $apiError = new GCS_errors_definitions_APIError();
        $apiError->code = 'code';
        $apiError->httpStatusCode = 400;
        $apiError->message = 'Test';
        $apiError->propertyName = 'foo';
        $apiError->requestId = '456';
        $errorResponse->errors = array($apiError);
        return $errorResponse;
    }

    /**
     * @param GCS_Communicator $communicator
     * @return GCS_UuidGenerator
     */
    protected function getCommunicatorUuidGenerator(GCS_Communicator $communicator)
    {
        $method = new ReflectionMethod($communicator, 'getUuidGenerator');
        $method->setAccessible(true);
        return $method->invoke($communicator);
    }

    /**
     * @param GCS_Communicator $communicator
     * @param $httpMethod
     * @param $relativeUriPathWithRequestParameters
     * @param string $clientMetaInfo
     * @param GCS_CallContext|null $callContext
     * @return string[]
     */
    protected function getCommunicatorRequestHeaders(
        GCS_Communicator $communicator,
        $httpMethod,
        $relativeUriPathWithRequestParameters,
        $clientMetaInfo = '',
        GCS_CallContext $callContext = null
    ) {
        $method = new ReflectionMethod($communicator, 'getRequestHeaders');
        $method->setAccessible(true);
        return $method->invoke(
            $communicator,
            $httpMethod,
            $relativeUriPathWithRequestParameters,
            $clientMetaInfo,
            $callContext
        );
    }
}
