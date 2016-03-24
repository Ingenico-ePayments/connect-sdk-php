<?php
namespace GCS\Token\Definitions;

use GCS\DataObject;

/**
 * Class MandateNonSepaDirectDebit
 *
 * @package GCS\Token\Definitions
 */
class MandateNonSepaDirectDebit extends DataObject
{
    /**
     * @var TokenNonSepaDirectDebitPaymentProduct705SpecificData
     */
    public $paymentProduct705SpecificData = null;

    /**
     * @var TokenNonSepaDirectDebitPaymentProduct707SpecificData
     */
    public $paymentProduct707SpecificData = null;

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
        if (property_exists($object, 'paymentProduct705SpecificData')) {
            if (!is_object($object->paymentProduct705SpecificData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct705SpecificData, true) . '\' is not an object'
                );
            }
            $value = new TokenNonSepaDirectDebitPaymentProduct705SpecificData();
            $this->paymentProduct705SpecificData = $value->fromObject($object->paymentProduct705SpecificData);
        }
        if (property_exists($object, 'paymentProduct707SpecificData')) {
            if (!is_object($object->paymentProduct707SpecificData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct707SpecificData, true) . '\' is not an object'
                );
            }
            $value = new TokenNonSepaDirectDebitPaymentProduct707SpecificData();
            $this->paymentProduct707SpecificData = $value->fromObject($object->paymentProduct707SpecificData);
        }
        return $this;
    }
}
