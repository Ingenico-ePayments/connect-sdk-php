<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class PersonalNameBase
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PersonalNameBase PersonalNameBase
 */
class PersonalNameBase extends DataObject
{
    /**
     * @var string
     */
    public $firstName = null;

    /**
     * @var string
     */
    public $surname = null;

    /**
     * @var string
     */
    public $surnamePrefix = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'firstName')) {
            $this->firstName = $object->firstName;
        }
        if (property_exists($object, 'surname')) {
            $this->surname = $object->surname;
        }
        if (property_exists($object, 'surnamePrefix')) {
            $this->surnamePrefix = $object->surnamePrefix;
        }
        return $this;
    }
}
