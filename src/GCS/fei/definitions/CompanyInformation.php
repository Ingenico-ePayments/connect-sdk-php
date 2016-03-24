<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class CompanyInformation
 *
 * @package GCS\fei\definitions
 */
class CompanyInformation extends DataObject
{
    /**
     * @var string
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
            $this->name = $object->name;
        }
        return $this;
    }
}
