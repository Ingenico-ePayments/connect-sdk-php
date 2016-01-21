<?php
class GCS_token_definitions_TokenNonSepaDirectDebit extends GCS_token_definitions_AbstractToken
{
    /**
     * @var GCS_token_definitions_CustomerToken
     */
    public $customer = null;

    /**
     * @var GCS_token_definitions_MandateNonSepaDirectDebit
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
            $value = new GCS_token_definitions_CustomerToken();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'mandate')) {
            if (!is_object($object->mandate)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mandate, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_MandateNonSepaDirectDebit();
            $this->mandate = $value->fromObject($object->mandate);
        }
        return $this;
    }
}
