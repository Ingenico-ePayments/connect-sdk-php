<?php
class GCS_token_definitions_MandateSepaDirectDebitWithMandateId extends GCS_token_definitions_MandateSepaDirectDebitWithoutCreditor
{
    /**
     * @var string
     */
    public $mandateId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'mandateId')) {
            $this->mandateId = $object->mandateId;
        }
        return $this;
    }
}
