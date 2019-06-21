<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Services;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Services\Definitions\BankData;
use Ingenico\Connect\Sdk\Domain\Services\Definitions\Swift;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Services
 */
class BankDetailsResponse extends DataObject
{
    /**
     * @var BankAccountBban
     */
    public $bankAccountBban = null;

    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var BankData
     */
    public $bankData = null;

    /**
     * @var Swift
     */
    public $swift = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->bankAccountBban)) {
            $object->bankAccountBban = $this->bankAccountBban->toObject();
        }
        if (!is_null($this->bankAccountIban)) {
            $object->bankAccountIban = $this->bankAccountIban->toObject();
        }
        if (!is_null($this->bankData)) {
            $object->bankData = $this->bankData->toObject();
        }
        if (!is_null($this->swift)) {
            $object->swift = $this->swift->toObject();
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
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountBban, true) . '\' is not an object');
            }
            $value = new BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'bankData')) {
            if (!is_object($object->bankData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankData, true) . '\' is not an object');
            }
            $value = new BankData();
            $this->bankData = $value->fromObject($object->bankData);
        }
        if (property_exists($object, 'swift')) {
            if (!is_object($object->swift)) {
                throw new UnexpectedValueException('value \'' . print_r($object->swift, true) . '\' is not an object');
            }
            $value = new Swift();
            $this->swift = $value->fromObject($object->swift);
        }
        return $this;
    }
}
