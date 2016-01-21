<?php

/**
 * RiskAssessments client.
 * Perform risk assessments on your customer data
 */
class GCS_Merchant_Riskassessments extends GCS_Resource
{
    /**
     * Resource /{merchantId}/riskassessments/cards
     * Risk-assess card
     *
     * @param GCS_riskassessments_RiskAssessmentCard $body
     * @return GCS_riskassessments_RiskAssessmentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cards($body)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_riskassessments_RiskAssessmentResponse');
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
     * @param GCS_riskassessments_RiskAssessmentBankAccount $body
     * @return GCS_riskassessments_RiskAssessmentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function bankaccounts($body)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_riskassessments_RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/riskassessments/bankaccounts'),
            $this->getClientMetaInfo(),
            $body
        );
    }
}
