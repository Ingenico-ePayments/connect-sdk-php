<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Product\Directory;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProducts;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\Merchant\Products\DirectoryParams;
use Ingenico\Connect\Sdk\Merchant\Products\FindProductsParams;
use Ingenico\Connect\Sdk\Merchant\Products\GetProductParams;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Products client.
 * Get information about payment products
 */
class Products extends Resource
{
    /**
     * Resource /{merchantId}/products/{paymentProductId}/directory
     * Get payment product directory
     *
     * @param int $paymentProductId
     * @param DirectoryParams $query
     * @param CallContext $callContext
     * @return Directory
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ApiException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ValidationException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__products__paymentProductId__directory_get Get payment product directory
     */
    public function directory($paymentProductId, $query, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Product\Directory');
        $responseClassMap->addResponseClassName(404, '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/products/{paymentProductId}/directory'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products
     * Get payment products
     *
     * @param FindProductsParams $query
     * @param CallContext $callContext
     * @return PaymentProducts
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ValidationException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ApiException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__products_get Get payment products
     */
    public function find($query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Product\PaymentProducts');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/products'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}
     * Get payment product
     *
     * @param int $paymentProductId
     * @param GetProductParams $query
     * @param CallContext $callContext
     * @return PaymentProductResponse
     * 
     * @throws GlobalCollectException
     * @throws InvalidResponseException
     * @throws AuthorizationException
     * @throws ValidationException
     * @throws ReferenceException
     * @throws IdempotenceException
     * @throws ApiException
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__products__paymentProductId__get Get payment product
     */
    public function get($paymentProductId, $query, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Product\PaymentProductResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/products/{paymentProductId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
