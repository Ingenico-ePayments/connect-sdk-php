<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Productgroups;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get payment product groups
 *
 * @package Ingenico\Connect\Sdk\Merchant\Productgroups
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/productgroups/find.html Get payment product groups
 */
class FindProductgroupsParams extends RequestObject
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
     * @var string[]
     */
    public $hide;
}
