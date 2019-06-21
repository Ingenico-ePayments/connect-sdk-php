<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->emailAddress)) {
            $object->emailAddress = $this->emailAddress;
        }
        if (!is_null($this->emailMessageType)) {
            $object->emailMessageType = $this->emailMessageType;
        }
        return $object;
    }

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
