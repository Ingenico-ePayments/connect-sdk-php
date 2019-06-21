<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class RefundPaymentProduct840SpecificOutput extends DataObject
{
    /**
     * @var RefundPaymentProduct840CustomerAccount
     */
    public $customerAccount = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->customerAccount)) {
            $object->customerAccount = $this->customerAccount->toObject();
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
        if (property_exists($object, 'customerAccount')) {
            if (!is_object($object->customerAccount)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customerAccount, true) . '\' is not an object');
            }
            $value = new RefundPaymentProduct840CustomerAccount();
            $this->customerAccount = $value->fromObject($object->customerAccount);
        }
        return $this;
    }
}
