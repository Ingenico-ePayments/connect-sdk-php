<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\ValueMappingElement;
use UnexpectedValueException;

/**
 * Class PaymentProductFieldFormElement
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProductFieldFormElement PaymentProductFieldFormElement
 */
class PaymentProductFieldFormElement extends DataObject
{
    /**
     * @var string
     */
    public $type = null;

    /**
     * @var ValueMappingElement[]
     */
    public $valueMapping = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        if (property_exists($object, 'valueMapping')) {
            if (!is_array($object->valueMapping) && !is_object($object->valueMapping)) {
                throw new UnexpectedValueException('value \'' . print_r($object->valueMapping, true) . '\' is not an array or object');
            }
            $this->valueMapping = [];
            foreach ($object->valueMapping as $valueMappingElementObject) {
                $valueMappingElement = new ValueMappingElement();
                $this->valueMapping[] = $valueMappingElement->fromObject($valueMappingElementObject);
            }
        }
        return $this;
    }
}
