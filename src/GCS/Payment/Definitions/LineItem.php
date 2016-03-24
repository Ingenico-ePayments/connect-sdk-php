<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\AmountOfMoney;

/**
 * Class LineItem
 *
 * @package GCS\Payment\Definitions
 */
class LineItem extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var LineItemInvoiceData
     */
    public $invoiceData = null;

    /**
     * @var LineItemLevel3InterchangeInformation
     */
    public $level3InterchangeInformation = null;

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
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->amountOfMoney, true) . '\' is not an object'
                );
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'invoiceData')) {
            if (!is_object($object->invoiceData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->invoiceData, true) . '\' is not an object'
                );
            }
            $value = new LineItemInvoiceData();
            $this->invoiceData = $value->fromObject($object->invoiceData);
        }
        if (property_exists($object, 'level3InterchangeInformation')) {
            if (!is_object($object->level3InterchangeInformation)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->level3InterchangeInformation, true) . '\' is not an object'
                );
            }
            $value = new LineItemLevel3InterchangeInformation();
            $this->level3InterchangeInformation = $value->fromObject($object->level3InterchangeInformation);
        }
        return $this;
    }
}
