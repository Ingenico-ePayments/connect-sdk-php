<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class BankTransferPaymentMethodSpecificInputBase
 *
 * @package GCS\payment\definitions
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
