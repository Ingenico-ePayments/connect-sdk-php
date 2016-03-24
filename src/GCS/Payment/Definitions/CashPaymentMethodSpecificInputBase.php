<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class CashPaymentMethodSpecificInputBase
 *
 * @package GCS\Payment\Definitions
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
