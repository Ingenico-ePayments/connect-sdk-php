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
class PaymentProduct863SpecificData extends DataObject
{
    /**
     * @var string[]
     */
    public $integrationTypes = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->integrationTypes)) {
            $object->integrationTypes = [];
            foreach ($this->integrationTypes as $element) {
                if (!is_null($element)) {
                    $object->integrationTypes[] = $element;
                }
            }
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
        if (property_exists($object, 'integrationTypes')) {
            if (!is_array($object->integrationTypes) && !is_object($object->integrationTypes)) {
                throw new UnexpectedValueException('value \'' . print_r($object->integrationTypes, true) . '\' is not an array or object');
            }
            $this->integrationTypes = [];
            foreach ($object->integrationTypes as $element) {
                $this->integrationTypes[] = $element;
            }
        }
        return $this;
    }
}
