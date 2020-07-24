<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Product\CreatePaymentProductSessionRequest;
use Ingenico\Connect\Sdk\Domain\Product\CreatePaymentProductSessionResponse;
use Ingenico\Connect\Sdk\Domain\Product\DeviceFingerprintRequest;
use Ingenico\Connect\Sdk\Domain\Product\DeviceFingerprintResponse;
use Ingenico\Connect\Sdk\Domain\Product\Directory;
use Ingenico\Connect\Sdk\Domain\Product\GetCustomerDetailsRequest;
use Ingenico\Connect\Sdk\Domain\Product\GetCustomerDetailsResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductNetworksResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProducts;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\Merchant\Products\DirectoryParams;
use Ingenico\Connect\Sdk\Merchant\Products\FindProductsParams;
use Ingenico\Connect\Sdk\Merchant\Products\GetProductParams;
use Ingenico\Connect\Sdk\Merchant\Products\NetworksParams;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Products client.
 */
class Products extends Resource
{
    /**
     * Resource /{merchantId}/products - Get payment products
     *
     * @param FindProductsParams $query
     * @param CallContext $callContext
     * @return PaymentProducts
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/find.html Get payment products
     */
    public function find(FindProductsParams $query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\PaymentProducts';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/products'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId} - Get payment product
     *
     * @param int $paymentProductId
     * @param GetProductParams $query
     * @param CallContext $callContext
     * @return PaymentProductResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/get.html Get payment product
     */
    public function get($paymentProductId, GetProductParams $query, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\PaymentProductResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/products/{paymentProductId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}/directory - Get payment product directory
     *
     * @param int $paymentProductId
     * @param DirectoryParams $query
     * @param CallContext $callContext
     * @return Directory
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/directory.html Get payment product directory
     */
    public function directory($paymentProductId, DirectoryParams $query, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\Directory';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/products/{paymentProductId}/directory'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}/customerDetails - Get customer details
     *
     * @param int $paymentProductId
     * @param GetCustomerDetailsRequest $body
     * @param CallContext $callContext
     * @return GetCustomerDetailsResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/customerDetails.html Get customer details
     */
    public function customerDetails($paymentProductId, GetCustomerDetailsRequest $body, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\GetCustomerDetailsResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/products/{paymentProductId}/customerDetails'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}/deviceFingerprint - Get device fingerprint
     *
     * @param int $paymentProductId
     * @param DeviceFingerprintRequest $body
     * @param CallContext $callContext
     * @return DeviceFingerprintResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/deviceFingerprint.html Get device fingerprint
     */
    public function deviceFingerprint($paymentProductId, DeviceFingerprintRequest $body, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\DeviceFingerprintResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/products/{paymentProductId}/deviceFingerprint'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}/networks - Get payment product networks
     *
     * @param int $paymentProductId
     * @param NetworksParams $query
     * @param CallContext $callContext
     * @return PaymentProductNetworksResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/networks.html Get payment product networks
     */
    public function networks($paymentProductId, NetworksParams $query, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\PaymentProductNetworksResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/products/{paymentProductId}/networks'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}/sessions - Create session for payment product
     *
     * @param int $paymentProductId
     * @param CreatePaymentProductSessionRequest $body
     * @param CallContext $callContext
     * @return CreatePaymentProductSessionResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/sessions.html Create session for payment product
     */
    public function sessions($paymentProductId, CreatePaymentProductSessionRequest $body, CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\CreatePaymentProductSessionResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/products/{paymentProductId}/sessions'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
