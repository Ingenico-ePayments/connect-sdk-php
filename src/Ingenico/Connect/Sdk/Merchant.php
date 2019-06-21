<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Merchant\Captures;
use Ingenico\Connect\Sdk\Merchant\Disputes;
use Ingenico\Connect\Sdk\Merchant\Files;
use Ingenico\Connect\Sdk\Merchant\Hostedcheckouts;
use Ingenico\Connect\Sdk\Merchant\Hostedmandatemanagements;
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

class Merchant extends Resource
{
    /**
     * Resource /{merchantId}/hostedcheckouts
     *
     * @return Hostedcheckouts
     */
    public function hostedcheckouts()
    {
        return new Hostedcheckouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/hostedmandatemanagements
     *
     * @return Hostedmandatemanagements
     */
    public function hostedmandatemanagements()
    {
        return new Hostedmandatemanagements($this, $this->context);
    }

    /**
     * Resource /{merchantId}/payments
     *
     * @return Payments
     */
    public function payments()
    {
        return new Payments($this, $this->context);
    }

    /**
     * Resource /{merchantId}/captures
     *
     * @return Captures
     */
    public function captures()
    {
        return new Captures($this, $this->context);
    }

    /**
     * Resource /{merchantId}/refunds
     *
     * @return Refunds
     */
    public function refunds()
    {
        return new Refunds($this, $this->context);
    }

    /**
     * Resource /{merchantId}/disputes
     *
     * @return Disputes
     */
    public function disputes()
    {
        return new Disputes($this, $this->context);
    }

    /**
     * Resource /{merchantId}/payouts
     *
     * @return Payouts
     */
    public function payouts()
    {
        return new Payouts($this, $this->context);
    }

    /**
     * Resource /{merchantId}/productgroups
     *
     * @return Productgroups
     */
    public function productgroups()
    {
        return new Productgroups($this, $this->context);
    }

    /**
     * Resource /{merchantId}/products
     *
     * @return Products
     */
    public function products()
    {
        return new Products($this, $this->context);
    }

    /**
     * Resource /{merchantId}/riskassessments
     *
     * @return Riskassessments
     */
    public function riskassessments()
    {
        return new Riskassessments($this, $this->context);
    }

    /**
     * Resource /{merchantId}/services
     *
     * @return Services
     */
    public function services()
    {
        return new Services($this, $this->context);
    }

    /**
     * Resource /{merchantId}/tokens
     *
     * @return Tokens
     */
    public function tokens()
    {
        return new Tokens($this, $this->context);
    }

    /**
     * Resource /{merchantId}/mandates
     *
     * @return Mandates
     */
    public function mandates()
    {
        return new Mandates($this, $this->context);
    }

    /**
     * Resource /{merchantId}/sessions
     *
     * @return Sessions
     */
    public function sessions()
    {
        return new Sessions($this, $this->context);
    }

    /**
     * Resource /{merchantId}/files
     *
     * @return Files
     */
    public function files()
    {
        return new Files($this, $this->context);
    }
}
