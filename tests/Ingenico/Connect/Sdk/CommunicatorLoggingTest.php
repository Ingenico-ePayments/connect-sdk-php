<?php
namespace Ingenico\Connect\Sdk;

use stdClass;
use Exception;
use ErrorException;
use ReflectionMethod;
use Ingenico\Connect\Sdk\Communicator;
use Ingenico\Connect\Sdk\CommunicatorLogger;
use Ingenico\Connect\Sdk\DefaultConnection;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;

/**
 * @group logging
 */
class CommunicatorLoggingTest extends \PHPUnit_Framework_TestCase
{
    public function testOnlyLogWhileLoggingIsEnabled()
    {
        $connection = new CommunicatorLoggingTestingConnection(
            $this->getMockConnectionResponse(200, array('Content-Type' => 'application/json'), '{}')
        );
        /** @var Connection $connection */
        $communicator = new Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $logger = $this->getMock('\Ingenico\Connect\Sdk\CommunicatorLogger');
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
        /** @var CommunicatorLogger $logger */
        $responseClassMap = $this->getMock('\Ingenico\Connect\Sdk\ResponseClassMap');
        /** @var ResponseClassMap $responseClassMap */
        $communicator->get($responseClassMap, '/foo');
        $communicator->enableLogging($logger);
        $communicator->get($responseClassMap, '/bar');
        $communicator->disableLogging();
        $communicator->get($responseClassMap, '/baz');
    }

    public function testLoggingForSuccessResponse()
    {
        $relativeRequestUri = '/foo/bar';
        $connection = new CommunicatorLoggingTestingConnection(
            $this->getMockConnectionResponse(200, array('Content-Type' => 'application/json'), '{}')
        );
        /** @var Connection $connection */
        $communicator = new Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($connection);
        $relativeRequestUriWithRequestParameters = $relativeRequestUri;
        $requestHeaders =
            $this->getCommunicatorRequestHeaders($communicator, 'POST', $relativeRequestUriWithRequestParameters);
        $requestBody = $this->getMockRequestDataObject();
        $httpObfuscator = new HttpObfuscator();
        $rawObfuscatedRequest = $httpObfuscator->getRawObfuscatedRequest(
            'POST',
            $relativeRequestUriWithRequestParameters,
            $requestHeaders,
            $requestBody->toJson()
        );
        $logger = $this->getMock('\Ingenico\Connect\Sdk\CommunicatorLogger');
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
        /** @var CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('\Ingenico\Connect\Sdk\ResponseClassMap');
        /** @var ResponseClassMap $responseClassMap */
        $communicator->post($responseClassMap, $relativeRequestUri, '', $requestBody);
    }

    public function testLoggingForClientErrorResponse()
    {
        $relativeRequestUri = '/foo/bar';
        $responseHeaders = array('Content-Type' => 'application/json');
        $errorResponse = $this->getErrorResponseDataObject();
        $connectionResponse = $this->getMockConnectionResponse(400, $responseHeaders, $errorResponse->toJson());
        $connection = new CommunicatorLoggingTestingConnection($connectionResponse);
        /** @var Connection $connection */
        $communicator = new Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($connection);
        $httpObfuscator = new HttpObfuscator();
        $rawObfuscatedResponse = $httpObfuscator->getRawObfuscatedResponse($connectionResponse);
        $logger = $this->getMock('\Ingenico\Connect\Sdk\CommunicatorLogger');
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
        /** @var CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('\Ingenico\Connect\Sdk\ResponseClassMap');
        /** @var ResponseClassMap $responseClassMap */
        try {
            $communicator->put($responseClassMap, $relativeRequestUri);
        } catch (ResponseException $e) {
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
        $connection = new CommunicatorLoggingTestingConnection($connectionResponse);
        /** @var Connection $connection */
        $communicator = new Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($connection);
        $httpObfuscator = new HttpObfuscator();
        $rawObfuscatedResponse = $httpObfuscator->getRawObfuscatedResponse($connectionResponse);
        $logger = $this->getMock('\Ingenico\Connect\Sdk\CommunicatorLogger');
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
        /** @var CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('\Ingenico\Connect\Sdk\ResponseClassMap');
        /** @var ResponseClassMap $responseClassMap */
        try {
            $communicator->get($responseClassMap, $relativeRequestUri);
        } catch (InvalidResponseException $e) {
            $this->assertEquals($connectionResponse, $e->getResponse());
            return;
        }
        $this->fail('an expected exception has not been raised');
    }

    public function testLoggingForCommunicationException()
    {
        $relativeRequestUri = '/foo/bar';
        $errorException = new ErrorException('Test error exception');
        $connection = new CommunicatorLoggingTestingConnection(null, $errorException);
        /** @var Connection $connection */
        $communicator = new Communicator(
            $connection,
            $this->getMockCommunicatorConfiguration()
        );
        $uuidGenerator = $this->getCommunicatorUuidGenerator($connection);
        $logger = $this->getMock('\Ingenico\Connect\Sdk\CommunicatorLogger');
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
        /** @var CommunicatorLogger $logger */
        $communicator->enableLogging($logger);
        $responseClassMap = $this->getMock('\Ingenico\Connect\Sdk\ResponseClassMap');
        /** @var ResponseClassMap $responseClassMap */
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
     * @return ConnectionResponse
     */
    protected function getMockConnectionResponse($httpStatusCode, $headers = array(), $body = '{}')
    {
        $connectionResponse = $this->getMock('\Ingenico\Connect\Sdk\ConnectionResponse');
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
     * @return CommunicatorConfiguration
     */
    protected function getMockCommunicatorConfiguration()
    {
        return $this->getMockBuilder('\Ingenico\Connect\Sdk\CommunicatorConfiguration')->disableOriginalConstructor()->getMock();
    }

    /**
     * @return DataObject
     */
    protected function getMockRequestDataObject()
    {
        $requestDataObject = $this->getMock('\Ingenico\Connect\Sdk\DataObject');
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
     * @return DataObject
     */
    protected function getErrorResponseDataObject()
    {
        $errorResponse = new ErrorResponse();
        $errorResponse->errorId = '123;';
        $apiError = new APIError();
        $apiError->code = 'code';
        $apiError->httpStatusCode = 400;
        $apiError->message = 'Test';
        $apiError->propertyName = 'foo';
        $apiError->requestId = '456';
        $errorResponse->errors = array($apiError);
        return $errorResponse;
    }

    /**
     * @param Connection $connection
     * @return CommunicatorLoggerHelper
     */
    protected function getCommunicatorLoggerHelper(Connection $connection)
    {
        $method = new ReflectionMethod($connection, 'getCommunicatorLoggerHelper');
        $method->setAccessible(true);
        return $method->invoke($connection);
    }

    /**
     * @param Connection $connection
     * @return UuidGenerator
     */
    protected function getCommunicatorUuidGenerator(Connection $connection)
    {
        $communicatorLoggerHelper = $this->getCommunicatorLoggerHelper($connection);
        $method = new ReflectionMethod($communicatorLoggerHelper, 'getUuidGenerator');
        $method->setAccessible(true);
        return $method->invoke($communicatorLoggerHelper);
    }

    /**
     * @param Communicator $communicator
     * @param $httpMethod
     * @param $relativeUriPathWithRequestParameters
     * @param string $clientMetaInfo
     * @param CallContext|null $callContext
     * @return string[]
     */
    protected function getCommunicatorRequestHeaders(
        Communicator $communicator,
        $httpMethod,
        $relativeUriPathWithRequestParameters,
        $clientMetaInfo = '',
        CallContext $callContext = null
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

class CommunicatorLoggingTestingConnection extends DefaultConnection
{
    private $response;
    private $exception;

    function __construct(ConnectionResponse $response = null, Exception $exception = null)
    {
        $this->response = $response;
        $this->exception = $exception;
    }

    protected function executeRequest(
        $httpMethod,
        $requestUri,
        $requestHeaders,
        $body,
        ProxyConfiguration $proxyConfiguration = null
    ) {
        if (!is_null($this->exception)) {
            throw $this->exception;
        } else {
            return $this->response;
        }
    }
}
