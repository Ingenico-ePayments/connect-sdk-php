<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class MandateNonSepaDirectDebit extends DataObject
{
    /**
     * @var TokenNonSepaDirectDebitPaymentProduct705SpecificData
     */
    public $paymentProduct705SpecificData = null;

    /**
     * @var TokenNonSepaDirectDebitPaymentProduct730SpecificData
     */
    public $paymentProduct730SpecificData = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProduct705SpecificData)) {
            $object->paymentProduct705SpecificData = $this->paymentProduct705SpecificData->toObject();
        }
        if (!is_null($this->paymentProduct730SpecificData)) {
            $object->paymentProduct730SpecificData = $this->paymentProduct730SpecificData->toObject();
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
        if (property_exists($object, 'paymentProduct705SpecificData')) {
            if (!is_object($object->paymentProduct705SpecificData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct705SpecificData, true) . '\' is not an object');
            }
            $value = new TokenNonSepaDirectDebitPaymentProduct705SpecificData();
            $this->paymentProduct705SpecificData = $value->fromObject($object->paymentProduct705SpecificData);
        }
        if (property_exists($object, 'paymentProduct730SpecificData')) {
            if (!is_object($object->paymentProduct730SpecificData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct730SpecificData, true) . '\' is not an object');
            }
            $value = new TokenNonSepaDirectDebitPaymentProduct730SpecificData();
            $this->paymentProduct730SpecificData = $value->fromObject($object->paymentProduct730SpecificData);
        }
        return $this;
    }
}
