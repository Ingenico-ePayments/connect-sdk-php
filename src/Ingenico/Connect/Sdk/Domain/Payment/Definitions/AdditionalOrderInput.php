<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AirlineData;
use Ingenico\Connect\Sdk\Domain\Definitions\LodgingData;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class AdditionalOrderInput extends DataObject
{
    /**
     * @var AirlineData
     */
    public $airlineData = null;

    /**
     * @var Installments
     */
    public $installments = null;

    /**
     * @var Level3SummaryData
     * @deprecated Use Order.shoppingCart.amountBreakdown instead
     */
    public $level3SummaryData = null;

    /**
     * @var LoanRecipient
     */
    public $loanRecipient = null;

    /**
     * @var LodgingData
     */
    public $lodgingData = null;

    /**
     * @var int
     * @deprecated Use installments.numberOfInstallments instead
     */
    public $numberOfInstallments = null;

    /**
     * @var string
     */
    public $orderDate = null;

    /**
     * @var OrderTypeInformation
     */
    public $typeInformation = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->airlineData)) {
            $object->airlineData = $this->airlineData->toObject();
        }
        if (!is_null($this->installments)) {
            $object->installments = $this->installments->toObject();
        }
        if (!is_null($this->level3SummaryData)) {
            $object->level3SummaryData = $this->level3SummaryData->toObject();
        }
        if (!is_null($this->loanRecipient)) {
            $object->loanRecipient = $this->loanRecipient->toObject();
        }
        if (!is_null($this->lodgingData)) {
            $object->lodgingData = $this->lodgingData->toObject();
        }
        if (!is_null($this->numberOfInstallments)) {
            $object->numberOfInstallments = $this->numberOfInstallments;
        }
        if (!is_null($this->orderDate)) {
            $object->orderDate = $this->orderDate;
        }
        if (!is_null($this->typeInformation)) {
            $object->typeInformation = $this->typeInformation->toObject();
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'airlineData')) {
            if (!is_object($object->airlineData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->airlineData, true) . '\' is not an object');
            }
            $value = new AirlineData();
            $this->airlineData = $value->fromObject($object->airlineData);
        }
        if (property_exists($object, 'installments')) {
            if (!is_object($object->installments)) {
                throw new UnexpectedValueException('value \'' . print_r($object->installments, true) . '\' is not an object');
            }
            $value = new Installments();
            $this->installments = $value->fromObject($object->installments);
        }
        if (property_exists($object, 'level3SummaryData')) {
            if (!is_object($object->level3SummaryData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->level3SummaryData, true) . '\' is not an object');
            }
            $value = new Level3SummaryData();
            $this->level3SummaryData = $value->fromObject($object->level3SummaryData);
        }
        if (property_exists($object, 'loanRecipient')) {
            if (!is_object($object->loanRecipient)) {
                throw new UnexpectedValueException('value \'' . print_r($object->loanRecipient, true) . '\' is not an object');
            }
            $value = new LoanRecipient();
            $this->loanRecipient = $value->fromObject($object->loanRecipient);
        }
        if (property_exists($object, 'lodgingData')) {
            if (!is_object($object->lodgingData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->lodgingData, true) . '\' is not an object');
            }
            $value = new LodgingData();
            $this->lodgingData = $value->fromObject($object->lodgingData);
        }
        if (property_exists($object, 'numberOfInstallments')) {
            $this->numberOfInstallments = $object->numberOfInstallments;
        }
        if (property_exists($object, 'orderDate')) {
            $this->orderDate = $object->orderDate;
        }
        if (property_exists($object, 'typeInformation')) {
            if (!is_object($object->typeInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->typeInformation, true) . '\' is not an object');
            }
            $value = new OrderTypeInformation();
            $this->typeInformation = $value->fromObject($object->typeInformation);
        }
        return $this;
    }
}
