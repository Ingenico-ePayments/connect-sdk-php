<?php

class GCS_Merchant_Products_GetParams extends GCS_RequestObject
{
    /**
     * @var int amount
     */
    public $amount;

    /**
     * @var string hide
     */
    public $hide;

    /**
     * @var bool isRecurring
     */
    public $isRecurring;

    /**
     * @var string countryCode
     */
    public $countryCode;

    /**
     * @var string locale
     */
    public $locale;

    /**
     * @var string currencyCode
     */
    public $currencyCode;

}
