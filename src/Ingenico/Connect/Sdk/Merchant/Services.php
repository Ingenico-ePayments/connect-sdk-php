<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Services\BankDetailsRequest;
use Ingenico\Connect\Sdk\Domain\Services\BankDetailsResponse;
use Ingenico\Connect\Sdk\Domain\Services\ConvertAmount;
use Ingenico\Connect\Sdk\Domain\Services\GetIINDetailsRequest;
use Ingenico\Connect\Sdk\Domain\Services\GetIINDetailsResponse;
use Ingenico\Connect\Sdk\Domain\Services\GetPrivacyPolicyResponse;
use Ingenico\Connect\Sdk\Domain\Services\TestConnection;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\Merchant\Services\ConvertAmountParams;
use Ingenico\Connect\Sdk\Merchant\Services\PrivacypolicyParams;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Services client.
 */
class Services extends Resource
{
    /**
     * Resource /{merchantId}/services/convert/amount - Convert amount
     *
     * @param ConvertAmountParams $query
     * @param CallContext $callContext
     * @return ConvertAmount
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/services/convertAmount.html Convert amount
     */
    public function convertAmount(ConvertAmountParams $query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Services\ConvertAmount';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/services/convert/amount'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/services/convert/bankaccount - Convert bankaccount
     *
     * @param BankDetailsRequest $body
     * @param CallContext $callContext
     * @return BankDetailsResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/services/bankaccount.html Convert bankaccount
     */
    public function bankaccount(BankDetailsRequest $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Services\BankDetailsResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/services/convert/bankaccount'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/services/getIINdetails - Get IIN details
     *
     * @param GetIINDetailsRequest $body
     * @param CallContext $callContext
     * @return GetIINDetailsResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/services/getIINdetails.html Get IIN details
     */
    public function getIINdetails(GetIINDetailsRequest $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Services\GetIINDetailsResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/services/getIINdetails'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/services/privacypolicy - Get privacy policy
     *
     * @param PrivacypolicyParams $query
     * @param CallContext $callContext
     * @return GetPrivacyPolicyResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/services/privacypolicy.html Get privacy policy
     */
    public function privacypolicy(PrivacypolicyParams $query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Services\GetPrivacyPolicyResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/services/privacypolicy'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/services/testconnection - Test connection
     *
     * @param CallContext $callContext
     * @return TestConnection
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/services/testconnection.html Test connection
     */
    public function testconnection(CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Services\TestConnection';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/services/testconnection'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }
}
