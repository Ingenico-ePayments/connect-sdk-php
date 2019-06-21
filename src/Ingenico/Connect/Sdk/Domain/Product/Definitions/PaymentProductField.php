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
class PaymentProductField extends DataObject
{
    /**
     * @var PaymentProductFieldDataRestrictions
     */
    public $dataRestrictions = null;

    /**
     * @var PaymentProductFieldDisplayHints
     */
    public $displayHints = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $type = null;

    /**
     * @var bool
     */
    public $usedForLookup = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->dataRestrictions)) {
            $object->dataRestrictions = $this->dataRestrictions->toObject();
        }
        if (!is_null($this->displayHints)) {
            $object->displayHints = $this->displayHints->toObject();
        }
        if (!is_null($this->id)) {
            $object->id = $this->id;
        }
        if (!is_null($this->type)) {
            $object->type = $this->type;
        }
        if (!is_null($this->usedForLookup)) {
            $object->usedForLookup = $this->usedForLookup;
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
        if (property_exists($object, 'dataRestrictions')) {
            if (!is_object($object->dataRestrictions)) {
                throw new UnexpectedValueException('value \'' . print_r($object->dataRestrictions, true) . '\' is not an object');
            }
            $value = new PaymentProductFieldDataRestrictions();
            $this->dataRestrictions = $value->fromObject($object->dataRestrictions);
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayHints, true) . '\' is not an object');
            }
            $value = new PaymentProductFieldDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        if (property_exists($object, 'usedForLookup')) {
            $this->usedForLookup = $object->usedForLookup;
        }
        return $this;
    }
}
