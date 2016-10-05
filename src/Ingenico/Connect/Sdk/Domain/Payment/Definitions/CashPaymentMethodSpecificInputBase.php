<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractPaymentMethodSpecificInput;
use UnexpectedValueException;

/**
 * Class CashPaymentMethodSpecificInputBase
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CashPaymentMethodSpecificInputBase CashPaymentMethodSpecificInputBase
 */
class CashPaymentMethodSpecificInputBase extends AbstractPaymentMethodSpecificInput
{
    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        return $this;
    }
}
