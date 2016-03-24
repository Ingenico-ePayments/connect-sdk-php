<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class AbstractOrderStatus
 *
 * @package GCS\fei\definitions
 */
class AbstractOrderStatus extends DataObject
{
    /**
     * @var string
     */
    public $id = null;

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
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        return $this;
    }
}
