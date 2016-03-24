<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class RedirectPaymentMethodSpecificInputBase
 *
 * @package GCS\payment\definitions
 */
class RedirectPaymentMethodSpecificInputBase extends AbstractPaymentMethodSpecificInput
{
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'recurringPaymentSequenceIndicator')) {
            $this->recurringPaymentSequenceIndicator = $object->recurringPaymentSequenceIndicator;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
