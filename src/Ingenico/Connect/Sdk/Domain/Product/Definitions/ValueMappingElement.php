<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ValueMappingElement
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ValueMappingElement ValueMappingElement
 */
class ValueMappingElement extends DataObject
{
    /**
     * @var string
     */
    public $displayName = null;

    /**
     * @var string
     */
    public $value = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'displayName')) {
            $this->displayName = $object->displayName;
        }
        if (property_exists($object, 'value')) {
            $this->value = $object->value;
        }
        return $this;
    }
}
