<?php
class GCS_payment_definitions_OrderOutput extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var GCS_payment_definitions_PaymentReferences
     */
    public $references = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PaymentReferences();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
