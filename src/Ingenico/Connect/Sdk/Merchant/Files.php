<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Files client.
 */
class Files extends Resource
{
    /**
     * Resource /{merchantId}/files/{fileId} - Retrieve File
     *
     * @param string $fileId
     * @param callable $bodyHandler Callable accepting a response body chunk and the response headers
     * @param CallContext $callContext
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/fileserviceapi/v1/en_US/php/files/getFile.html Retrieve File
     */
    public function getFile($fileId, callable $bodyHandler, CallContext $callContext = null)
    {
        $this->context['fileId'] = $fileId;
        $responseClassMap = new ResponseClassMap();
        $this->getCommunicator()->getWithBinaryResponse(
            $responseClassMap,
            $this->instantiateUri('/files/v1/{merchantId}/files/{fileId}'),
            $this->getClientMetaInfo(),
            null,
            $bodyHandler,
            $callContext
        );
    }
}
