<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\Domain\Token\Definitions\ContactDetailsToken;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\CustomerToken;
use UnexpectedValueException;

/**
 * Class CustomerTokenWithContactDetails
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CustomerTokenWithContactDetails CustomerTokenWithContactDetails
 */
class CustomerTokenWithContactDetails extends CustomerToken
{
    /**
     * @var ContactDetailsToken
     */
    public $contactDetails = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->contactDetails, true) . '\' is not an object');
            }
            $value = new ContactDetailsToken();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        return $this;
    }
}
