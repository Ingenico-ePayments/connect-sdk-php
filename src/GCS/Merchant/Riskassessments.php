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
     * @param GCS_CallContext $callContext
     * @return GCS_riskassessments_RiskAssessmentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cards($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_riskassessments_RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/riskassessments/cards'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/riskassessments/bankaccounts
     * Risk-assess bank account
     *
     * @param GCS_riskassessments_RiskAssessmentBankAccount $body
     * @param GCS_CallContext $callContext
     * @return GCS_riskassessments_RiskAssessmentResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function bankaccounts($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_riskassessments_RiskAssessmentResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/riskassessments/bankaccounts'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
