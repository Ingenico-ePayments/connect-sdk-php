<?php
namespace GCS\Product\Definitions;

use GCS\DataObject;

/**
 * Class EmptyValidator
 *
 * @package GCS\Product\Definitions
 */
class EmptyValidator extends DataObject
{
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
        return $this;
    }
}
