<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class CompanyInformation
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CompanyInformation CompanyInformation
 */
class CompanyInformation extends DataObject
{
    /**
     * @var string
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
            $this->name = $object->name;
        }
        return $this;
    }
}
