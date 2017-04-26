<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant\Products;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get payment product networks
 *
 * @package Ingenico\Connect\Sdk\Merchant\Products
 * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__products__paymentProductId__networks_get Get payment product networks
 */
class NetworksParams extends RequestObject
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
     * @var int
     */
    public $amount;

    /**
     * @var bool
     */
    public $isRecurring;
}
