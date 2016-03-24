<?php
namespace GCS\Merchant\Tokens;

use GCS\RequestObject;

/**
 * Class DeleteParams
 *
 * @package GCS\Merchant\Tokens
 */
class DeleteParams extends RequestObject
{
    /**
     * @var string
     */
    public $mandateCancelDate;

}
