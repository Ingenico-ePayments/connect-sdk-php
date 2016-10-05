<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalName;
use UnexpectedValueException;

/**
 * Class AddressPersonal
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_AddressPersonal AddressPersonal
 */
class AddressPersonal extends Address
{
    /**
     * @var PersonalName
     */
    public $name = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new UnexpectedValueException('value \'' . print_r($object->name, true) . '\' is not an object');
            }
            $value = new PersonalName();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
