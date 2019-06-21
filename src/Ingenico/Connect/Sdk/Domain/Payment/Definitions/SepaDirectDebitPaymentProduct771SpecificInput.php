<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Mandates\Definitions\CreateMandateWithReturnUrl;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class SepaDirectDebitPaymentProduct771SpecificInput extends AbstractSepaDirectDebitPaymentProduct771SpecificInput
{
    /**
     * @var string
     */
    public $existingUniqueMandateReference = null;

    /**
     * @var CreateMandateWithReturnUrl
     */
    public $mandate = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->existingUniqueMandateReference)) {
            $object->existingUniqueMandateReference = $this->existingUniqueMandateReference;
        }
        if (!is_null($this->mandate)) {
            $object->mandate = $this->mandate->toObject();
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
        if (property_exists($object, 'existingUniqueMandateReference')) {
            $this->existingUniqueMandateReference = $object->existingUniqueMandateReference;
        }
        if (property_exists($object, 'mandate')) {
            if (!is_object($object->mandate)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mandate, true) . '\' is not an object');
            }
            $value = new CreateMandateWithReturnUrl();
            $this->mandate = $value->fromObject($object->mandate);
        }
        return $this;
    }
}
