<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class RedirectPaymentProduct809SpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RedirectPaymentProduct809SpecificInput RedirectPaymentProduct809SpecificInput
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
