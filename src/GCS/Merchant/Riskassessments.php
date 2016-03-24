<?php
namespace GCS\Merchant;

use GCS\errors\ErrorResponse;
use GCS\Resource;
use GCS\ResponseClassMap;
use GCS\riskassessments\RiskAssessmentBankAccount;
use GCS\riskassessments\RiskAssessmentCard;
use GCS\riskassessments\RiskAssessmentResponse;

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
        $responseClassMap->addResponseClassName(200, '\GCS\riskassessments\RiskAssessmentResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\riskassessments\RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/riskassessments/bankaccounts'),
            $this->getClientMetaInfo(),
            $body
        );
    }
}
