<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractPaymentMethodSpecificInput;
use UnexpectedValueException;

/**
 * Class RedirectPaymentMethodSpecificInputBase
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RedirectPaymentMethodSpecificInputBase RedirectPaymentMethodSpecificInputBase
 */
class RedirectPaymentMethodSpecificInputBase extends AbstractPaymentMethodSpecificInput
{
    /**
     * @var int
     */
    public $expirationPeriod = null;

    /**
     * @var string
     */
    public $recurringPaymentSequenceIndicator = null;

    /**
     * @var string
     */
    public $token = null;

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
        if (property_exists($object, 'recurringPaymentSequenceIndicator')) {
            $this->recurringPaymentSequenceIndicator = $object->recurringPaymentSequenceIndicator;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
