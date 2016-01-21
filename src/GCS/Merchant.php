<?php

/**
 */
class GCS_Merchant extends GCS_Resource
{
    /**
     * Resource /{merchantId}/payouts
     * Create, cancel and approve payouts
     *
     * @return GCS_Merchant_Payouts
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function payouts()
    {
        return new GCS_Merchant_Payouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/refunds
     * Create, cancel and approve refunds
     *
     * @return GCS_Merchant_Refunds
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function refunds()
    {
        return new GCS_Merchant_Refunds($this, $this->context);
    }

    /**
     * Resource /{merchantId}/sessions
     * Create new Session for Client2Server API calls
     *
     * @return GCS_Merchant_Sessions
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function sessions()
    {
        return new GCS_Merchant_Sessions($this, $this->context);
    }

    /**
     * Resource /{merchantId}/tokens
     * Create, delete and update tokens
     *
     * @return GCS_Merchant_Tokens
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function tokens()
    {
        return new GCS_Merchant_Tokens($this, $this->context);
    }

    /**
     * Resource /{merchantId}/hostedcheckouts
     * Create new hosted checkout
     *
     * @return GCS_Merchant_Hostedcheckouts
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function hostedcheckouts()
    {
        return new GCS_Merchant_Hostedcheckouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/products
     * Get information about payment products
     *
     * @return GCS_Merchant_Products
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function products()
    {
        return new GCS_Merchant_Products($this, $this->context);
    }

    /**
     * Resource /{merchantId}/payments
     * Create, cancel and approve payments
     *
     * @return GCS_Merchant_Payments
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function payments()
    {
        return new GCS_Merchant_Payments($this, $this->context);
    }

    /**
     * Resource /{merchantId}/services
     * Several services to help you
     *
     * @return GCS_Merchant_Services
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function services()
    {
        return new GCS_Merchant_Services($this, $this->context);
    }

    /**
     * Resource /{merchantId}/riskassessments
     * Perform risk assessments on your customer data
     *
     * @return GCS_Merchant_Riskassessments
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function riskassessments()
    {
        return new GCS_Merchant_Riskassessments($this, $this->context);
    }
}
