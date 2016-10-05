<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Services;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class TestConnection
 *
 * @package Ingenico\Connect\Sdk\Domain\Services
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_TestConnection TestConnection
 */
class TestConnection extends DataObject
{
    /**
     * @var string
     */
    public $result = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
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
