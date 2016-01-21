<?php
class GCS_token_definitions_MandateNonSepaDirectDebit extends GCS_DataObject
{
    /**
     * @var GCS_token_definitions_TokenNonSepaDirectDebitPaymentProduct705SpecificData
     */
    public $paymentProduct705SpecificData = null;

    /**
     * @var GCS_token_definitions_TokenNonSepaDirectDebitPaymentProduct707SpecificData
     */
    public $paymentProduct707SpecificData = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'paymentProduct705SpecificData')) {
            if (!is_object($object->paymentProduct705SpecificData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct705SpecificData, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_TokenNonSepaDirectDebitPaymentProduct705SpecificData();
            $this->paymentProduct705SpecificData = $value->fromObject($object->paymentProduct705SpecificData);
        }
        if (property_exists($object, 'paymentProduct707SpecificData')) {
            if (!is_object($object->paymentProduct707SpecificData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct707SpecificData, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_TokenNonSepaDirectDebitPaymentProduct707SpecificData();
            $this->paymentProduct707SpecificData = $value->fromObject($object->paymentProduct707SpecificData);
        }
        return $this;
    }
}
