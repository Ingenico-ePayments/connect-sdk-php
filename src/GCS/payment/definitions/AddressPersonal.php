<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\Address;

/**
 * Class AddressPersonal
 *
 * @package GCS\payment\definitions
 */
class AddressPersonal extends Address
{
    /**
     * @var PersonalName
     */
    public $name = null;

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
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->name, true) . '\' is not an object'
                );
            }
            $value = new PersonalName();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
