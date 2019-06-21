<?php
namespace Ingenico\Connect\Sdk;

/**
 * @group multipart/form-data
 *
 */
class MultipartFormDataTest extends TestCase
{
    public function testMultipartFormDataUploadPostWithMultipartFormDataObjectWithResponse()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\HttpBinResponse';

        $response = $communicator->post($responseClassMap, '/post', '', $multipart, null, null);

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }

    public function testMultipartFormDataUploadPostWithMultipartDataObjectWithResponse()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\HttpBinResponse';

        $response = $communicator->post($responseClassMap, '/post', '', new MultipartFormDataWrapper($multipart), null, null);

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }

    public function testMultipartFormDataUploadPostWithMultipartFormDataObjectWithCallable()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();

        $responseBuilder = new ResponseBuilder();
        $bodyHandler = function ($data, $headers) use ($responseBuilder) {
            $responseBuilder->setHeaders($headers);
            $responseBuilder->appendBody($data);
        };

        $communicator->postWithBinaryResponse($responseClassMap, '/post', '', $multipart, null, $bodyHandler);

        $response = new HttpBinResponse();
        $response->fromJson($responseBuilder->getResponse()->getBody());

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }

    public function testMultipartFormDataUploadPostWithMultipartDataObjectWithCallable()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();

        $responseBuilder = new ResponseBuilder();
        $bodyHandler = function ($data, $headers) use ($responseBuilder) {
            $responseBuilder->setHeaders($headers);
            $responseBuilder->appendBody($data);
        };

        $communicator->postWithBinaryResponse($responseClassMap, '/post', '', new MultipartFormDataWrapper($multipart), null, $bodyHandler);

        $response = new HttpBinResponse();
        $response->fromJson($responseBuilder->getResponse()->getBody());

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }

    public function testMultipartFormDataUploadPutWithMultipartFormDataObjectWithResponse()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\HttpBinResponse';

        $response = $communicator->put($responseClassMap, '/put', '', $multipart, null, null);

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }

    public function testMultipartFormDataUploadPutWithMultipartDataObjectWithResponse()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\HttpBinResponse';

        $response = $communicator->put($responseClassMap, '/put', '', new MultipartFormDataWrapper($multipart), null, null);

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }

    public function testMultipartFormDataUploadPutWithMultipartFormDataObjectWithCallable()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();

        $responseBuilder = new ResponseBuilder();
        $bodyHandler = function ($data, $headers) use ($responseBuilder) {
            $responseBuilder->setHeaders($headers);
            $responseBuilder->appendBody($data);
        };

        $communicator->putWithBinaryResponse($responseClassMap, '/put', '', $multipart, null, $bodyHandler);

        $response = new HttpBinResponse();
        $response->fromJson($responseBuilder->getResponse()->getBody());

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }

    public function testMultipartFormDataUploadPutWithMultipartDataObjectWithCallable()
    {
        $connection = new DefaultConnection();
        $communicatorConfiguration = $this->getCommunicatorConfiguration();
        $communicatorConfiguration->setApiEndpoint('http://httpbin.org');
        $communicator = new Communicator($connection, $communicatorConfiguration);

        $multipart = new MultipartFormDataObject();
        $multipart->addFile('file', new UploadableFile('file.txt', 'file-content', 'text/plain'));
        $multipart->addValue('value', 'Hello World');

        $responseClassMap = new ResponseClassMap();

        $responseBuilder = new ResponseBuilder();
        $bodyHandler = function ($data, $headers) use ($responseBuilder) {
            $responseBuilder->setHeaders($headers);
            $responseBuilder->appendBody($data);
        };

        $communicator->putWithBinaryResponse($responseClassMap, '/put', '', new MultipartFormDataWrapper($multipart), null, $bodyHandler);

        $response = new HttpBinResponse();
        $response->fromJson($responseBuilder->getResponse()->getBody());

        $this->assertEquals($response->form->value, 'Hello World');
        $this->assertEquals($response->files->file, 'file-content');
    }
}

class HttpBinResponse extends DataObject
{
    public $form;
    public $files;

    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->form)) {
            $object->form = $this->form;
        }
        if (!is_null($this->files)) {
            $object->files = $this->files;
        }
        return $object;
    }

    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'form')) {
            $this->form = $object->form;
        }
        if (property_exists($object, 'files')) {
            $this->files = $object->files;
        }
        return $this;
    }
}

class MultipartFormDataWrapper extends MultipartDataObject
{
    private $multipart;

    public function __construct($multipart)
    {
        $this->multipart = $multipart;
    }

    public function toMultipartFormDataObject()
    {
        return $this->multipart;
    }
}
