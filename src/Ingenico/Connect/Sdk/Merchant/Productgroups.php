<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Product\DeviceFingerprintRequest;
use Ingenico\Connect\Sdk\Domain\Product\DeviceFingerprintResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroupResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroups;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\Merchant\Productgroups\FindProductgroupsParams;
use Ingenico\Connect\Sdk\Merchant\Productgroups\GetProductgroupParams;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Product Groups client.
 */
class Productgroups extends Resource
{
    /**
     * Resource /{merchantId}/productgroups - Get payment product groups
     *
     * @param FindProductgroupsParams $query
     * @param CallContext $callContext
     * @return PaymentProductGroups
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/productgroups/find.html Get payment product groups
     */
    public function find(FindProductgroupsParams $query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroups';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/productgroups'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/productgroups/{paymentProductGroupId} - Get payment product group
     *
     * @param string $paymentProductGroupId
     * @param GetProductgroupParams $query
     * @param CallContext $callContext
     * @return PaymentProductGroupResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/productgroups/get.html Get payment product group
     */
    public function get($paymentProductGroupId, GetProductgroupParams $query, CallContext $callContext = null)
    {
        $this->context['paymentProductGroupId'] = $paymentProductGroupId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroupResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/productgroups/{paymentProductGroupId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/productgroups/{paymentProductGroupId}/deviceFingerprint - Get device fingerprint
     *
     * @param string $paymentProductGroupId
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
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/productgroups/deviceFingerprint.html Get device fingerprint
     */
    public function deviceFingerprint($paymentProductGroupId, DeviceFingerprintRequest $body, CallContext $callContext = null)
    {
        $this->context['paymentProductGroupId'] = $paymentProductGroupId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Product\DeviceFingerprintResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/productgroups/{paymentProductGroupId}/deviceFingerprint'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
