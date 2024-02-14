<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Merchant\Productgroups;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get payment product group
 *
 * @package Ingenico\Connect\Sdk\Merchant\Productgroups
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/productgroups/get.html Get payment product group
 */
class GetProductgroupParams extends RequestObject
{
    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $currencyCode;

    /**
     * @var string
     */
    public $locale;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var bool
     */
    public $isRecurring;

    /**
     * @var bool
     */
    public $isInstallments;

    /**
     * @var string[]
     */
    public $hide;
}
