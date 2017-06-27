<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Tokens;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Delete token
 *
 * @package Ingenico\Connect\Sdk\Merchant\Tokens
 * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/tokens/delete.html Delete token
 */
class DeleteTokenParams extends RequestObject
{
    /**
     * @var string
     */
    public $mandateCancelDate;
}
