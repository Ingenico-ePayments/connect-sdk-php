<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class CashPaymentMethodSpecificInputBase
 *
 * @package GCS\payment\definitions
 */
class CashPaymentMethodSpecificInputBase extends AbstractPaymentMethodSpecificInput
{
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
        return $this;
    }
}
