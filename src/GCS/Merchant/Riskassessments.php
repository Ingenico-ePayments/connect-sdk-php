<?php
namespace GCS\Merchant;

use GCS\Errors\ErrorResponse;
use GCS\Resource;
use GCS\ResponseClassMap;
use GCS\RiskAssessments\RiskAssessmentBankAccount;
use GCS\RiskAssessments\RiskAssessmentCard;
use GCS\RiskAssessments\RiskAssessmentResponse;

/**
 * Class Riskassessments
 * RiskAssessments client.
 * Perform risk assessments on your customer data
 *
 * @package GCS\Merchant
 */
class Riskassessments extends Resource
{
    /**
     * Resource /{merchantId}/riskassessments/cards
     * Risk-assess card
     *
     * @param RiskAssessmentCard $body
     *
     * @return RiskAssessmentResponse
     *
     * @throws ErrorResponse
     */
    public function cards($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\RiskAssessments\RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/riskassessments/cards'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/riskassessments/bankaccounts
     * Risk-assess bank account
     *
     * @param RiskAssessmentBankAccount $body
     *
     * @return RiskAssessmentResponse
     *
     * @throws ErrorResponse
     */
    public function bankaccounts($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\RiskAssessments\RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/riskassessments/bankaccounts'),
            $this->getClientMetaInfo(),
            $body
        );
    }
}
