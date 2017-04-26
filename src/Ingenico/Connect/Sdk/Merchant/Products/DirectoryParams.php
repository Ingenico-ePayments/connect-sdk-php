<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant\Products;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get payment product directory
 *
 * @package Ingenico\Connect\Sdk\Merchant\Products
 * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__products__paymentProductId__directory_get Get payment product directory
 */
class DirectoryParams extends RequestObject
{
    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $currencyCode;
}
