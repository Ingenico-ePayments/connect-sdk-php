<?php
/**
 * class BankDetailsResponse
 */
namespace GCS\services;

use GCS\fei\definitions\BankAccountBban;
use GCS\fei\definitions\BankAccountIban;

/**
 * Class BankDetailsResponse
 *
 * @package GCS\services
 */
class BankDetailsResponse extends \GCS\DataObject
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
     * @var definitions\BankData
     */
    public $bankData = null;

    /**
     * @var definitions\Swift
     */
    public $swift = null;

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
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountBban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountIban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'bankData')) {
            if (!is_object($object->bankData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankData, true) . '\' is not an object'
                );
            }
            $value = new definitions\BankData();
            $this->bankData = $value->fromObject($object->bankData);
        }
        if (property_exists($object, 'swift')) {
            if (!is_object($object->swift)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->swift, true) . '\' is not an object'
                );
            }
            $value = new definitions\Swift();
            $this->swift = $value->fromObject($object->swift);
        }
        return $this;
    }
}
