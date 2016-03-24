<?php
namespace GCS\Merchant\Products;

use GCS\RequestObject;

/**
 * Class GetParams
 *
 * @package GCS\Merchant\Products
 */
class GetParams extends RequestObject
{
    /**
     * @var int
     */
    public $amount;

    /**
     * @var string
     */
    public $hide;

    /**
     * @var bool
     */
    public $isRecurring;

    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $locale;

    /**
     * @var string
     */
    public $currencyCode;

}
