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
class RedirectPaymentProduct809SpecificInput extends DataObject
{
    /**
     * @var string
     * @deprecated Use RedirectPaymentMethodSpecificInput.expirationPeriod instead
     */
    public $expirationPeriod = null;

    /**
     * @var string
     */
    public $issuerId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->expirationPeriod)) {
            $object->expirationPeriod = $this->expirationPeriod;
        }
        if (!is_null($this->issuerId)) {
            $object->issuerId = $this->issuerId;
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
        if (property_exists($object, 'expirationPeriod')) {
            $this->expirationPeriod = $object->expirationPeriod;
        }
        if (property_exists($object, 'issuerId')) {
            $this->issuerId = $object->issuerId;
        }
        return $this;
    }
}
