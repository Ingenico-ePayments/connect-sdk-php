<?php
class GCS_token_definitions_TokenSepaDirectDebitWithoutCreditor extends GCS_token_definitions_AbstractToken
{
    /**
     * @var GCS_token_definitions_CustomerTokenWithContactDetails
     */
    public $customer = null;

    /**
     * @var GCS_token_definitions_MandateSepaDirectDebitWithoutCreditor
     */
    public $mandate = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_CustomerTokenWithContactDetails();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'mandate')) {
            if (!is_object($object->mandate)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mandate, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_MandateSepaDirectDebitWithoutCreditor();
            $this->mandate = $value->fromObject($object->mandate);
        }
        return $this;
    }
}
