<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Merchant\Tokens;

use Ingenico\Connect\Sdk\RequestObject;

/**
 * Query parameters for Delete token
 *
 * @package Ingenico\Connect\Sdk\Merchant\Tokens
 * @link https://developer.globalcollect.com/documentation/api/server/#__merchantId__tokens__tokenId__delete Delete token
 */
class DeleteTokenParams extends RequestObject
{
    /**
     * @var string
     */
    public $mandateCancelDate;
}
