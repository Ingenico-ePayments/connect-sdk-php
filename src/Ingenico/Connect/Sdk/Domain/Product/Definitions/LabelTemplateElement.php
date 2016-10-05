<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class LabelTemplateElement
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_LabelTemplateElement LabelTemplateElement
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
     * @return $this
     * @throws UnexpectedValueException
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
