<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class CheckPaymentMethodSpecificInput
 *
 * @package GCS\Payment\Definitions
 */
class CheckPaymentMethodSpecificInput extends AbstractPaymentMethodSpecificInput
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
