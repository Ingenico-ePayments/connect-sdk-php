<?php
class GCS_token_definitions_CustomerTokenWithContactDetails extends GCS_token_definitions_CustomerToken
{
    /**
     * @var GCS_token_definitions_ContactDetailsToken
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
            $value = new GCS_token_definitions_ContactDetailsToken();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        return $this;
    }
}
