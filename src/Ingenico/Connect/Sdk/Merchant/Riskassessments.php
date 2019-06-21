<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentBankAccount;
use Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentCard;
use Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Risk assessments client.
 */
class Riskassessments extends Resource
{
    /**
     * Resource /{merchantId}/riskassessments/bankaccounts - Risk-assess bankaccount
     *
     * @param RiskAssessmentBankAccount $body
     * @param CallContext $callContext
     * @return RiskAssessmentResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/riskassessments/bankaccounts.html Risk-assess bankaccount
     */
    public function bankaccounts(RiskAssessmentBankAccount $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/riskassessments/bankaccounts'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/riskassessments/cards - Risk-assess card
     *
     * @param RiskAssessmentCard $body
     * @param CallContext $callContext
     * @return RiskAssessmentResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/riskassessments/cards.html Risk-assess card
     */
    public function cards(RiskAssessmentCard $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/riskassessments/cards'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
