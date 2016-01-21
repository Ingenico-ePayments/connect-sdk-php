<?php
class GCS_fei_definitions_ContactDetailsBase extends GCS_DataObject
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
