<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant\Services;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Convert amount
 *
 * @package Ingenico\Connect\Sdk\Merchant\Services
 * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__services_convert_amount_get Convert amount
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
