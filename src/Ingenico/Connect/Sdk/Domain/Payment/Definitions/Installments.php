<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class Installments extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoneyPerInstallment = null;

    /**
     * @var AmountOfMoney
     */
    public $amountOfMoneyTotal = null;

    /**
     * @var string
     */
    public $frequencyOfInstallments = null;

    /**
     * @var int
     */
    public $installmentPlanCode = null;

    /**
     * @var string
     */
    public $interestRate = null;

    /**
     * @var int
     */
    public $numberOfInstallments = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amountOfMoneyPerInstallment)) {
            $object->amountOfMoneyPerInstallment = $this->amountOfMoneyPerInstallment->toObject();
        }
        if (!is_null($this->amountOfMoneyTotal)) {
            $object->amountOfMoneyTotal = $this->amountOfMoneyTotal->toObject();
        }
        if (!is_null($this->frequencyOfInstallments)) {
            $object->frequencyOfInstallments = $this->frequencyOfInstallments;
        }
        if (!is_null($this->installmentPlanCode)) {
            $object->installmentPlanCode = $this->installmentPlanCode;
        }
        if (!is_null($this->interestRate)) {
            $object->interestRate = $this->interestRate;
        }
        if (!is_null($this->numberOfInstallments)) {
            $object->numberOfInstallments = $this->numberOfInstallments;
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
        if (property_exists($object, 'amountOfMoneyPerInstallment')) {
            if (!is_object($object->amountOfMoneyPerInstallment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoneyPerInstallment, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoneyPerInstallment = $value->fromObject($object->amountOfMoneyPerInstallment);
        }
        if (property_exists($object, 'amountOfMoneyTotal')) {
            if (!is_object($object->amountOfMoneyTotal)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoneyTotal, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoneyTotal = $value->fromObject($object->amountOfMoneyTotal);
        }
        if (property_exists($object, 'frequencyOfInstallments')) {
            $this->frequencyOfInstallments = $object->frequencyOfInstallments;
        }
        if (property_exists($object, 'installmentPlanCode')) {
            $this->installmentPlanCode = $object->installmentPlanCode;
        }
        if (property_exists($object, 'interestRate')) {
            $this->interestRate = $object->interestRate;
        }
        if (property_exists($object, 'numberOfInstallments')) {
            $this->numberOfInstallments = $object->numberOfInstallments;
        }
        return $this;
    }
}
