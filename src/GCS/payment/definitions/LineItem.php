<?php
class GCS_payment_definitions_LineItem extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var GCS_payment_definitions_LineItemInvoiceData
     */
    public $invoiceData = null;

    /**
     * @var GCS_payment_definitions_LineItemLevel3InterchangeInformation
     */
    public $level3InterchangeInformation = null;

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
        if (property_exists($object, 'invoiceData')) {
            if (!is_object($object->invoiceData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invoiceData, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_LineItemInvoiceData();
            $this->invoiceData = $value->fromObject($object->invoiceData);
        }
        if (property_exists($object, 'level3InterchangeInformation')) {
            if (!is_object($object->level3InterchangeInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->level3InterchangeInformation, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_LineItemLevel3InterchangeInformation();
            $this->level3InterchangeInformation = $value->fromObject($object->level3InterchangeInformation);
        }
        return $this;
    }
}
