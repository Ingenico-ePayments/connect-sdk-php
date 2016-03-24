<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\ContactDetailsBase;

/**
 * Class ContactDetails
 *
 * @package GCS\Payment\Definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
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
