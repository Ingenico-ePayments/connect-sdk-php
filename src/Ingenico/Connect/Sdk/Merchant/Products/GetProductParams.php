<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant\Products;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get payment product
 *
 * @package Ingenico\Connect\Sdk\Merchant\Products
 * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__products__paymentProductId__get Get payment product
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
}
