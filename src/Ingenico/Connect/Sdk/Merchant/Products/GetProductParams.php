<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Products;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get payment product
 *
 * @package Ingenico\Connect\Sdk\Merchant\Products
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/get.html Get payment product
 */
class GetProductParams extends RequestObject
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

    /**
     * @var bool
     */
    public $forceBasicFlow;
}
