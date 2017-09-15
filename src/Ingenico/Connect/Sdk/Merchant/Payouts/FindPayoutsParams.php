<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Payouts;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Find payouts
 *
 * @package Ingenico\Connect\Sdk\Merchant\Payouts
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payouts/find.html Find payouts
 */
class FindPayoutsParams extends RequestObject
{
    /**
     * @var string
     */
    public $merchantReference;

    /**
     * @var int
     */
    public $merchantOrderId;

    /**
     * @var int
     */
    public $offset;

    /**
     * @var int
     */
    public $limit;
}
