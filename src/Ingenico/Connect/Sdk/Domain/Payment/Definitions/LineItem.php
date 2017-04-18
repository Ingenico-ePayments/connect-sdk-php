<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\LineItemInvoiceData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\LineItemLevel3InterchangeInformation;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderLineDetails;
use UnexpectedValueException;

/**
 * Class LineItem
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_LineItem LineItem
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
     * @deprecated Use orderLineDetails instead
     */
    public $level3InterchangeInformation = null;

    /**
     * @var OrderLineDetails
     */
    public $orderLineDetails = null;

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
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'invoiceData')) {
            if (!is_object($object->invoiceData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invoiceData, true) . '\' is not an object');
            }
            $value = new LineItemInvoiceData();
            $this->invoiceData = $value->fromObject($object->invoiceData);
        }
        if (property_exists($object, 'level3InterchangeInformation')) {
            if (!is_object($object->level3InterchangeInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->level3InterchangeInformation, true) . '\' is not an object');
            }
            $value = new LineItemLevel3InterchangeInformation();
            $this->level3InterchangeInformation = $value->fromObject($object->level3InterchangeInformation);
        }
        if (property_exists($object, 'orderLineDetails')) {
            if (!is_object($object->orderLineDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->orderLineDetails, true) . '\' is not an object');
            }
            $value = new OrderLineDetails();
            $this->orderLineDetails = $value->fromObject($object->orderLineDetails);
        }
        return $this;
    }
}
