<?php
namespace GCS\Product\Definitions;

use GCS\DataObject;

/**
 * Class RegularExpressionValidator
 *
 * @package GCS\Product\Definitions
 */
class RegularExpressionValidator extends DataObject
{
    /**
     * @var string
     */
    public $regularExpression = null;

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
        if (property_exists($object, 'regularExpression')) {
            $this->regularExpression = $object->regularExpression;
        }
        return $this;
    }
}
