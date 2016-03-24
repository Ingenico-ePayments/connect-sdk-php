<?php
namespace GCS\Merchant\Services;

use GCS\RequestObject;

/**
 * Class ConvertAmountParams
 *
 * @package GCS\Merchant\Services
 */
class ConvertAmountParams extends RequestObject
{
    /**
     * @var string
     */
    public $source;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var string
     */
    public $target;

}
