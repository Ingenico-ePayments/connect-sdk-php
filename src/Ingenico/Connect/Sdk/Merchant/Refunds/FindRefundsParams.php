<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Refunds;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Find refunds
 *
 * @package Ingenico\Connect\Sdk\Merchant\Refunds
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/refunds/find.html Find refunds
 */
class FindRefundsParams extends RequestObject
{
    /**
     * @var string
     */
    public $hostedCheckoutId;

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
