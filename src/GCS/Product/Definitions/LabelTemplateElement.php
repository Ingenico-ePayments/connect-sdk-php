<?php
namespace GCS\Product\Definitions;

use GCS\DataObject;

/**
 * Class LabelTemplateElement
 *
 * @package GCS\Product\Definitions
 */
class LabelTemplateElement extends DataObject
{
    /**
     * @var string
     */
    public $attributeKey = null;

    /**
     * @var string
     */
    public $mask = null;

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
        if (property_exists($object, 'attributeKey')) {
            $this->attributeKey = $object->attributeKey;
        }
        if (property_exists($object, 'mask')) {
            $this->mask = $object->mask;
        }
        return $this;
    }
}
