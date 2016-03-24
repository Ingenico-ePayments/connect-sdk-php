<?php
namespace GCS\Merchant\Products;

use GCS\RequestObject;

/**
 * Class FindParams
 *
 * @package GCS\Merchant\Products
 */
class FindParams extends RequestObject
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
