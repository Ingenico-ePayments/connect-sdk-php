<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class RegularExpressionValidator
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RegularExpressionValidator RegularExpressionValidator
 */
class RegularExpressionValidator extends DataObject
{
    /**
     * @var string
     */
    public $regularExpression = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'regularExpression')) {
            $this->regularExpression = $object->regularExpression;
        }
        return $this;
    }
}
