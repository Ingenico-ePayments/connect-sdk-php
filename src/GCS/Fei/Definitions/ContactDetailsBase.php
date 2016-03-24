<?php
namespace GCS\Fei\Definitions;

use GCS\DataObject;

/**
 * Class ContactDetailsBase
 *
 * @package GCS\Fei\Definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
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
