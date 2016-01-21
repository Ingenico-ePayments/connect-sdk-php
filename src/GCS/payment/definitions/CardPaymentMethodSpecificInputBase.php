<?php
class GCS_payment_definitions_CardPaymentMethodSpecificInputBase extends GCS_fei_definitions_AbstractPaymentMethodSpecificInput
{
    /**
     * @var string
     */
    public $customerReference = null;

    /**
     * @var string
     */
    public $recurringPaymentSequenceIndicator = null;

    /**
     * @var bool
     */
    public $skipAuthentication = null;

    /**
     * @var bool
     */
    public $skipFraudService = null;

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
        if (property_exists($object, 'customerReference')) {
            $this->customerReference = $object->customerReference;
        }
        if (property_exists($object, 'recurringPaymentSequenceIndicator')) {
            $this->recurringPaymentSequenceIndicator = $object->recurringPaymentSequenceIndicator;
        }
        if (property_exists($object, 'skipAuthentication')) {
            $this->skipAuthentication = $object->skipAuthentication;
        }
        if (property_exists($object, 'skipFraudService')) {
            $this->skipFraudService = $object->skipFraudService;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
