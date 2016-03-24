<?php
namespace GCS\services;

use GCS\DataObject;

/**
 * Class TestConnection
 *
 * @package GCS\services
 */
class TestConnection extends DataObject
{
    /**
     * @var string
     */
    public $result = null;

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
        if (property_exists($object, 'result')) {
            $this->result = $object->result;
        }
        return $this;
    }
}
