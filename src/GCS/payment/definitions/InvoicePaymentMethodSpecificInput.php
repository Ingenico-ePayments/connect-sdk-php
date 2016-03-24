<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class InvoicePaymentMethodSpecificInput
 *
 * @package GCS\payment\definitions
 */
class InvoicePaymentMethodSpecificInput extends AbstractPaymentMethodSpecificInput
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
