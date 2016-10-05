<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class FixedListValidator
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_FixedListValidator FixedListValidator
 */
class FixedListValidator extends DataObject
{
    /**
     * @var string[]
     */
    public $allowedValues = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'allowedValues')) {
            if (!is_array($object->allowedValues) && !is_object($object->allowedValues)) {
                throw new UnexpectedValueException('value \'' . print_r($object->allowedValues, true) . '\' is not an array or object');
            }
            $this->allowedValues = [];
            foreach ($object->allowedValues as $allowedValuesElementObject) {
                $this->allowedValues[] = $allowedValuesElementObject;
            }
        }
        return $this;
    }
}
