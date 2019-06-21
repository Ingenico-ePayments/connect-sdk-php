<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 */
class PaymentProductDisplayHints extends DataObject
{
    /**
     * @var int
     */
    public $displayOrder = null;

    /**
     * @var string
     */
    public $label = null;

    /**
     * @var string
     */
    public $logo = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->displayOrder)) {
            $object->displayOrder = $this->displayOrder;
        }
        if (!is_null($this->label)) {
            $object->label = $this->label;
        }
        if (!is_null($this->logo)) {
            $object->logo = $this->logo;
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
        if (property_exists($object, 'displayOrder')) {
            $this->displayOrder = $object->displayOrder;
        }
        if (property_exists($object, 'label')) {
            $this->label = $object->label;
        }
        if (property_exists($object, 'logo')) {
            $this->logo = $object->logo;
        }
        return $this;
    }
}
