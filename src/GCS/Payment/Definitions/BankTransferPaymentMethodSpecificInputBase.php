<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class BankTransferPaymentMethodSpecificInputBase
 *
 * @package GCS\Payment\Definitions
 */
class BankTransferPaymentMethodSpecificInputBase extends AbstractPaymentMethodSpecificInput
{
    /**
     * @var string
     */
    public $additionalReference = null;

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
        if (property_exists($object, 'additionalReference')) {
            $this->additionalReference = $object->additionalReference;
        }
        return $this;
    }
}
