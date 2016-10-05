<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use UnexpectedValueException;

/**
 * Class BankAccountBbanRefund
 *
 * @package Ingenico\Connect\Sdk\Domain\Refund\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_BankAccountBbanRefund BankAccountBbanRefund
 */
class BankAccountBbanRefund extends BankAccountBban
{
    /**
     * @var string
     */
    public $bankCity = null;

    /**
     * @var string
     */
    public $swiftCode = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bankCity')) {
            $this->bankCity = $object->bankCity;
        }
        if (property_exists($object, 'swiftCode')) {
            $this->swiftCode = $object->swiftCode;
        }
        return $this;
    }
}
