<?php
namespace GCS\product\definitions;

use GCS\DataObject;

/**
 * Class PaymentProductFieldFormElement
 *
 * @package GCS\product\definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        if (property_exists($object, 'valueMapping')) {
            if (!is_array($object->valueMapping) && !is_object($object->valueMapping)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->valueMapping, true) . '\' is not an array or object'
                );
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
