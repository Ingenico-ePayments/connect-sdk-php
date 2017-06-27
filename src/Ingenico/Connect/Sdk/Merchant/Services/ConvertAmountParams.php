<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Services;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Convert amount
 *
 * @package Ingenico\Connect\Sdk\Merchant\Services
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/services/convertAmount.html Convert amount
 */
class ConvertAmountParams extends RequestObject
{
    /**
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $target;

    /**
     * @var int
     */
    public $amount;
}
