<?php
namespace GCS\product\definitions;

use GCS\DataObject;

/**
 * Class PaymentProductFieldTooltip
 *
 * @package GCS\product\definitions
 */
class PaymentProductFieldTooltip extends DataObject
{
    /**
     * @var string
     */
    public $image = null;

    /**
     * @var string
     */
    public $label = null;

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
        if (property_exists($object, 'image')) {
            $this->image = $object->image;
        }
        if (property_exists($object, 'label')) {
            $this->label = $object->label;
        }
        return $this;
    }
}
