<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\ContactDetailsBase;
use UnexpectedValueException;

/**
 * Class ContactDetails
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ContactDetails ContactDetails
 */
class ContactDetails extends ContactDetailsBase
{
    /**
     * @var string
     */
    public $faxNumber = null;

    /**
     * @var string
     */
    public $phoneNumber = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'faxNumber')) {
            $this->faxNumber = $object->faxNumber;
        }
        if (property_exists($object, 'phoneNumber')) {
            $this->phoneNumber = $object->phoneNumber;
        }
        return $this;
    }
}
