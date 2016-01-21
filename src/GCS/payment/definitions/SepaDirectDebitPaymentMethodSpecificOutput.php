<?php
class GCS_payment_definitions_SepaDirectDebitPaymentMethodSpecificOutput extends GCS_payment_definitions_AbstractPaymentMethodSpecificOutput
{
    /**
     * @var GCS_fei_definitions_FraudResults
     */
    public $fraudResults = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudResults, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_FraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
        return $this;
    }
}
