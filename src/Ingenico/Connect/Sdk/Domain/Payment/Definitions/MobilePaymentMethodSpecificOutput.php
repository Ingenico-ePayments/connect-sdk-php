<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\CardFraudResults;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class MobilePaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var string
     */
    public $authorisationCode = null;

    /**
     * @var CardFraudResults
     */
    public $fraudResults = null;

    /**
     * @var string
     */
    public $network = null;

    /**
     * @var MobilePaymentData
     */
    public $paymentData = null;

    /**
     * @var ThreeDSecureResults
     */
    public $threeDSecureResults = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->authorisationCode)) {
            $object->authorisationCode = $this->authorisationCode;
        }
        if (!is_null($this->fraudResults)) {
            $object->fraudResults = $this->fraudResults->toObject();
        }
        if (!is_null($this->network)) {
            $object->network = $this->network;
        }
        if (!is_null($this->paymentData)) {
            $object->paymentData = $this->paymentData->toObject();
        }
        if (!is_null($this->threeDSecureResults)) {
            $object->threeDSecureResults = $this->threeDSecureResults->toObject();
        }
        return $object;
    }

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
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudResults, true) . '\' is not an object');
            }
            $value = new CardFraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
        if (property_exists($object, 'network')) {
            $this->network = $object->network;
        }
        if (property_exists($object, 'paymentData')) {
            if (!is_object($object->paymentData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentData, true) . '\' is not an object');
            }
            $value = new MobilePaymentData();
            $this->paymentData = $value->fromObject($object->paymentData);
        }
        if (property_exists($object, 'threeDSecureResults')) {
            if (!is_object($object->threeDSecureResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->threeDSecureResults, true) . '\' is not an object');
            }
            $value = new ThreeDSecureResults();
            $this->threeDSecureResults = $value->fromObject($object->threeDSecureResults);
        }
        return $this;
    }
}
