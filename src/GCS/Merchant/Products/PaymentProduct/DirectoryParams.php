<?php
namespace GCS\Merchant\Products\PaymentProduct;

use GCS\RequestObject;

/**
 * Class DirectoryParams
 *
 * @package GCS\Merchant\Products\PaymentProduct
 */
class DirectoryParams extends RequestObject
{
    /**
     * @var string
     */
    public $currencyCode;

    /**
     * @var string
     */
    public $countryCode;

}
