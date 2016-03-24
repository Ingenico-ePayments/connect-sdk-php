<?php
namespace GCS\Services;

use GCS\DataObject;

/**
 * Class TestConnection
 *
 * @package GCS\Services
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
