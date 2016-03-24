<?php
namespace GCS\token\definitions;

use GCS\DataObject;

/**
 * Class PersonalInformationToken
 *
 * @package GCS\token\definitions
 */
class PersonalInformationToken extends DataObject
{
    /**
     * @var PersonalNameToken
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
            $value = new PersonalNameToken();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
