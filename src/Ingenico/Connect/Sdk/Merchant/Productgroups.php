<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
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
 * Get information about payment product groups
 */
class Productgroups extends Resource
{
    /**
     * Resource /{merchantId}/productgroups
     * Get payment product groups
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
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__productgroups_get Get payment product groups
     */
    public function find($query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroups');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/productgroups'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/productgroups/{paymentProductGroupId}
     * Get payment product group
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
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__productgroups__paymentProductGroupId__get Get payment product group
     */
    public function get($paymentProductGroupId, $query, CallContext $callContext = null)
    {
        $this->context['paymentProductGroupId'] = $paymentProductGroupId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroupResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/productgroups/{paymentProductGroupId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
