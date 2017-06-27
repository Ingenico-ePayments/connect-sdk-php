<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Products;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get payment product directory
 *
 * @package Ingenico\Connect\Sdk\Merchant\Products
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/products/directory.html Get payment product directory
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
