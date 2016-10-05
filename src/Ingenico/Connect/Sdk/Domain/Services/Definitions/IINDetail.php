<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Services\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class IINDetail
 *
 * @package Ingenico\Connect\Sdk\Domain\Services\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_IINDetail IINDetail
 */
class IINDetail extends DataObject
{
    /**
     * @var bool
     */
    public $isAllowedInContext = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'isAllowedInContext')) {
            $this->isAllowedInContext = $object->isAllowedInContext;
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
