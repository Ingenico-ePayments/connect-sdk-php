<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Merchant\Payments;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Find payments
 *
 * @package Ingenico\Connect\Sdk\Merchant\Payments
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payments/find.html Find payments
 */
class FindPaymentsParams extends RequestObject
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
