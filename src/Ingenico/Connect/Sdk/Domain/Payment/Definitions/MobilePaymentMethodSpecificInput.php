<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\DecryptedPaymentData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\MobilePaymentProduct320SpecificInput;
use UnexpectedValueException;

/**
 * Class MobilePaymentMethodSpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_MobilePaymentMethodSpecificInput MobilePaymentMethodSpecificInput
 */
class MobilePaymentMethodSpecificInput extends AbstractPaymentMethodSpecificInput
{
    /**
     * @var string
     */
    public $authorizationMode = null;

    /**
     * @var DecryptedPaymentData
     */
    public $decryptedPaymentData = null;

    /**
     * @var string
     */
    public $encryptedPaymentData = null;

    /**
     * @var MobilePaymentProduct320SpecificInput
     */
    public $paymentProduct320SpecificInput = null;

    /**
     * @var bool
     */
    public $requiresApproval = null;

    /**
     * @var bool
     */
    public $skipFraudService = null;

    /**
     * @var string
     */
    public $transactionId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'authorizationMode')) {
            $this->authorizationMode = $object->authorizationMode;
        }
        if (property_exists($object, 'decryptedPaymentData')) {
            if (!is_object($object->decryptedPaymentData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->decryptedPaymentData, true) . '\' is not an object');
            }
            $value = new DecryptedPaymentData();
            $this->decryptedPaymentData = $value->fromObject($object->decryptedPaymentData);
        }
        if (property_exists($object, 'encryptedPaymentData')) {
            $this->encryptedPaymentData = $object->encryptedPaymentData;
        }
        if (property_exists($object, 'paymentProduct320SpecificInput')) {
            if (!is_object($object->paymentProduct320SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct320SpecificInput, true) . '\' is not an object');
            }
            $value = new MobilePaymentProduct320SpecificInput();
            $this->paymentProduct320SpecificInput = $value->fromObject($object->paymentProduct320SpecificInput);
        }
        if (property_exists($object, 'requiresApproval')) {
            $this->requiresApproval = $object->requiresApproval;
        }
        if (property_exists($object, 'skipFraudService')) {
            $this->skipFraudService = $object->skipFraudService;
        }
        if (property_exists($object, 'transactionId')) {
            $this->transactionId = $object->transactionId;
        }
        return $this;
    }
}
