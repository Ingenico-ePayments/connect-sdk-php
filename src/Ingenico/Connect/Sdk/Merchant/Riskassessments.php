<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
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
 * RiskAssessments client.
 * Perform risk assessments on your customer data
 */
class Riskassessments extends Resource
{
    /**
     * Resource /{merchantId}/riskassessments/bankaccounts
     * Risk-assess bank account
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
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__riskassessments_bankaccounts_post Risk-assess bank account
     */
    public function bankaccounts($body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/riskassessments/bankaccounts'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/riskassessments/cards
     * Risk-assess card
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
     * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__riskassessments_cards_post Risk-assess card
     */
    public function cards($body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/riskassessments/cards'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
