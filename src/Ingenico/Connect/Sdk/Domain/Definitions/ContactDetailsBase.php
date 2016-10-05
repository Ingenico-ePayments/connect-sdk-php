<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ContactDetailsBase
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ContactDetailsBase ContactDetailsBase
 */
class ContactDetailsBase extends DataObject
{
    /**
     * @var string
     */
    public $emailAddress = null;

    /**
     * @var string
     */
    public $emailMessageType = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'emailAddress')) {
            $this->emailAddress = $object->emailAddress;
        }
        if (property_exists($object, 'emailMessageType')) {
            $this->emailMessageType = $object->emailMessageType;
        }
        return $this;
    }
}
