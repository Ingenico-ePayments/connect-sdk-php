<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Merchant\Hostedcheckouts;
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
     * Resource /{merchantId}/payments
     * Create, cancel and approve payments
     *
     * @return Payments
     * @link https://developer.globalcollect.com/documentation/api/server/#payments Create, cancel and approve payments
     */
    public function payments()
    {
        return new Payments($this, $this->context);
    }

    /**
     * Resource /{merchantId}/payouts
     * Create, cancel and approve payouts
     *
     * @return Payouts
     * @link https://developer.globalcollect.com/documentation/api/server/#payouts Create, cancel and approve payouts
     */
    public function payouts()
    {
        return new Payouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/products
     * Get information about payment products
     *
     * @return Products
     * @link https://developer.globalcollect.com/documentation/api/server/#products Get information about payment products
     */
    public function products()
    {
        return new Products($this, $this->context);
    }

    /**
     * Resource /{merchantId}/productgroups
     * Get information about payment product groups
     *
     * @return Productgroups
     * @link https://developer.globalcollect.com/documentation/api/server/#productgroups Get information about payment product groups
     */
    public function productgroups()
    {
        return new Productgroups($this, $this->context);
    }

    /**
     * Resource /{merchantId}/refunds
     * Create, cancel and approve refunds
     *
     * @return Refunds
     * @link https://developer.globalcollect.com/documentation/api/server/#refunds Create, cancel and approve refunds
     */
    public function refunds()
    {
        return new Refunds($this, $this->context);
    }

    /**
     * Resource /{merchantId}/riskassessments
     * Perform risk assessments on your customer data
     *
     * @return Riskassessments
     * @link https://developer.globalcollect.com/documentation/api/server/#riskassessments Perform risk assessments on your customer data
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
     * @link https://developer.globalcollect.com/documentation/api/server/#services Several services to help you
     */
    public function services()
    {
        return new Services($this, $this->context);
    }

    /**
     * Resource /{merchantId}/sessions
     * Create new Session for Client2Server API calls
     *
     * @return Sessions
     * @link https://developer.globalcollect.com/documentation/api/server/#sessions Create new Session for Client2Server API calls
     */
    public function sessions()
    {
        return new Sessions($this, $this->context);
    }

    /**
     * Resource /{merchantId}/tokens
     * Create, delete and update tokens
     *
     * @return Tokens
     * @link https://developer.globalcollect.com/documentation/api/server/#tokens Create, delete and update tokens
     */
    public function tokens()
    {
        return new Tokens($this, $this->context);
    }

    /**
     * Resource /{merchantId}/hostedcheckouts
     * Create new hosted checkout
     *
     * @return Hostedcheckouts
     * @link https://developer.globalcollect.com/documentation/api/server/#hostedcheckouts Create new hosted checkout
     */
    public function hostedcheckouts()
    {
        return new Hostedcheckouts($this, $this->context);
    }
}
