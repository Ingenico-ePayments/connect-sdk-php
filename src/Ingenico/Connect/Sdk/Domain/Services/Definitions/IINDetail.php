<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Services\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Services\Definitions
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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->isAllowedInContext)) {
            $object->isAllowedInContext = $this->isAllowedInContext;
        }
        if (!is_null($this->paymentProductId)) {
            $object->paymentProductId = $this->paymentProductId;
        }
        return $object;
    }

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
