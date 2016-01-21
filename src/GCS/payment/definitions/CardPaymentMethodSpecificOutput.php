<?php
class GCS_payment_definitions_CardPaymentMethodSpecificOutput extends GCS_payment_definitions_AbstractPaymentMethodSpecificOutput
{
    /**
     * @var string
     */
    public $authorisationCode = null;

    /**
     * @var GCS_fei_definitions_CardEssentials
     */
    public $card = null;

    /**
     * @var GCS_fei_definitions_CardFraudResults
     */
    public $fraudResults = null;

    /**
     * @var GCS_payment_definitions_ThreeDSecureResults
     */
    public $threeDSecureResults = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'authorisationCode')) {
            $this->authorisationCode = $object->authorisationCode;
        }
        if (property_exists($object, 'card')) {
            if (!is_object($object->card)) {
                throw new UnexpectedValueException('value \'' . print_r($object->card, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_CardEssentials();
            $this->card = $value->fromObject($object->card);
        }
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudResults, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_CardFraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
        if (property_exists($object, 'threeDSecureResults')) {
            if (!is_object($object->threeDSecureResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->threeDSecureResults, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_ThreeDSecureResults();
            $this->threeDSecureResults = $value->fromObject($object->threeDSecureResults);
        }
        return $this;
    }
}
