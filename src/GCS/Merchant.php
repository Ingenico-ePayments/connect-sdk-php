<?php
namespace GCS;

/**
 * Class Merchant
 *
 * @package GCS
 */
class Merchant extends Resource
{
    /**
     * Resource /{merchantId}/payouts
     * Create, cancel and approve payouts
     *
     * @return Merchant\Payouts
     *
     * @throws Errors\ErrorResponse
     */
    public function payouts()
    {
        return new Merchant\Payouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/refunds
     * Create, cancel and approve refunds
     *
     * @return Merchant\Refunds
     *
     * @throws Errors\ErrorResponse
     */
    public function refunds()
    {
        return new Merchant\Refunds($this, $this->context);
    }

    /**
     * Resource /{merchantId}/sessions
     * Create new Session for Client2Server API calls
     *
     * @return Merchant\Sessions
     *
     * @throws Errors\ErrorResponse
     */
    public function sessions()
    {
        return new Merchant\Sessions($this, $this->context);
    }

    /**
     * Resource /{merchantId}/tokens
     * Create, delete and update tokens
     *
     * @return Merchant\Tokens
     *
     * @throws Errors\ErrorResponse
     */
    public function tokens()
    {
        return new Merchant\Tokens($this, $this->context);
    }

    /**
     * Resource /{merchantId}/hostedcheckouts
     * Create new hosted checkout
     *
     * @return Merchant\Hostedcheckouts
     *
     * @throws Errors\ErrorResponse
     */
    public function hostedcheckouts()
    {
        return new Merchant\Hostedcheckouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/products
     * Get information about payment products
     *
     * @return Merchant\Products
     *
     * @throws Errors\ErrorResponse
     */
    public function products()
    {
        return new Merchant\Products($this, $this->context);
    }

    /**
     * Resource /{merchantId}/payments
     * Create, cancel and approve payments
     *
     * @return Merchant\Payments
     *
     * @throws Errors\ErrorResponse
     */
    public function payments()
    {
        return new Merchant\Payments($this, $this->context);
    }

    /**
     * Resource /{merchantId}/services
     * Several services to help you
     *
     * @return Merchant\Services
     *
     * @throws Errors\ErrorResponse
     */
    public function services()
    {
        return new Merchant\Services($this, $this->context);
    }

    /**
     * Resource /{merchantId}/riskassessments
     * Perform risk assessments on your customer data
     *
     * @return Merchant\Riskassessments
     *
     * @throws Errors\ErrorResponse
     */
    public function riskassessments()
    {
        return new Merchant\Riskassessments($this, $this->context);
    }
}
