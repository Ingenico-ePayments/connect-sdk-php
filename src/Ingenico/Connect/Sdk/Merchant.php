<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Merchant\Captures;
use Ingenico\Connect\Sdk\Merchant\Hostedcheckouts;
use Ingenico\Connect\Sdk\Merchant\Mandates;
use Ingenico\Connect\Sdk\Merchant\Payments;
use Ingenico\Connect\Sdk\Merchant\Payouts;
use Ingenico\Connect\Sdk\Merchant\Productgroups;
use Ingenico\Connect\Sdk\Merchant\Products;
use Ingenico\Connect\Sdk\Merchant\Refunds;
use Ingenico\Connect\Sdk\Merchant\Riskassessments;
use Ingenico\Connect\Sdk\Merchant\Services;
use Ingenico\Connect\Sdk\Merchant\Sessions;
use Ingenico\Connect\Sdk\Merchant\Tokens;
use Ingenico\Connect\Sdk\Resource;

class Merchant extends Resource
{
    /**
     * Resource /{merchantId}/hostedcheckouts
     * Create new hosted checkout
     *
     * @return Hostedcheckouts
     */
    public function hostedcheckouts()
    {
        return new Hostedcheckouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/payments
     * Create, cancel and approve payments
     *
     * @return Payments
     */
    public function payments()
    {
        return new Payments($this, $this->context);
    }

    /**
     * Resource /{merchantId}/captures
     * Get capture
     *
     * @return Captures
     */
    public function captures()
    {
        return new Captures($this, $this->context);
    }

    /**
     * Resource /{merchantId}/refunds
     * Create, cancel and approve refunds
     *
     * @return Refunds
     */
    public function refunds()
    {
        return new Refunds($this, $this->context);
    }

    /**
     * Resource /{merchantId}/payouts
     * Create, cancel and approve payouts
     *
     * @return Payouts
     */
    public function payouts()
    {
        return new Payouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/productgroups
     * Get information about payment product groups
     *
     * @return Productgroups
     */
    public function productgroups()
    {
        return new Productgroups($this, $this->context);
    }

    /**
     * Resource /{merchantId}/products
     * Get information about payment products
     *
     * @return Products
     */
    public function products()
    {
        return new Products($this, $this->context);
    }

    /**
     * Resource /{merchantId}/riskassessments
     * Perform risk assessments on your customer data
     *
     * @return Riskassessments
     */
    public function riskassessments()
    {
        return new Riskassessments($this, $this->context);
    }

    /**
     * Resource /{merchantId}/services
     * Several services to help you
     *
     * @return Services
     */
    public function services()
    {
        return new Services($this, $this->context);
    }

    /**
     * Resource /{merchantId}/tokens
     * Create, delete and update tokens
     *
     * @return Tokens
     */
    public function tokens()
    {
        return new Tokens($this, $this->context);
    }

    /**
     * Resource /{merchantId}/mandates
     * Create, get and update mandates
     *
     * @return Mandates
     */
    public function mandates()
    {
        return new Mandates($this, $this->context);
    }

    /**
     * Resource /{merchantId}/sessions
     * Create new Session for Client2Server API calls
     *
     * @return Sessions
     */
    public function sessions()
    {
        return new Sessions($this, $this->context);
    }
}
