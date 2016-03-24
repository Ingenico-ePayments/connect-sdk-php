<?php
namespace GCS\product\definitions;

use GCS\DataObject;

/**
 * Class EmptyValidator
 *
 * @package GCS\product\definitions
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
