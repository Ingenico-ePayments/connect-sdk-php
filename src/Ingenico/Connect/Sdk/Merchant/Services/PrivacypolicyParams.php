<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Services;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Get privacy policy
 *
 * @package Ingenico\Connect\Sdk\Merchant\Services
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/services/privacypolicy.html Get privacy policy
 */
class PrivacypolicyParams extends RequestObject
{
    /**
     * @var string
     */
    public $locale;

    /**
     * @var int
     */
    public $paymentProductId;
}
