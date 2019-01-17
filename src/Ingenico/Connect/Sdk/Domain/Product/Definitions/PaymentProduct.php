<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 */
class PaymentProduct extends DataObject
{
    /**
     * @var AccountOnFile[]
     */
    public $accountsOnFile = null;

    /**
     * @var bool
     */
    public $allowsRecurring = null;

    /**
     * @var bool
     */
    public $allowsTokenization = null;

    /**
     * @var AuthenticationIndicator
     */
    public $authenticationIndicator = null;

    /**
     * @var bool
     */
    public $autoTokenized = null;

    /**
     * @var bool
     */
    public $canBeIframed = null;

    /**
     * @var bool
     */
    public $deviceFingerprintEnabled = null;

    /**
     * @var PaymentProductDisplayHints
     */
    public $displayHints = null;

    /**
     * @var PaymentProductField[]
     */
    public $fields = null;

    /**
     * @var string
     */
    public $fieldsWarning = null;

    /**
     * @var int
     */
    public $id = null;

    /**
     * @var bool
     */
    public $isJavaScriptRequired = null;

    /**
     * @var int
     */
    public $maxAmount = null;

    /**
     * @var int
     */
    public $minAmount = null;

    /**
     * @var string
     */
    public $mobileIntegrationLevel = null;

    /**
     * @var string
     */
    public $paymentMethod = null;

    /**
     * @var PaymentProduct302SpecificData
     */
    public $paymentProduct302SpecificData = null;

    /**
     * @var PaymentProduct320SpecificData
     */
    public $paymentProduct320SpecificData = null;

    /**
     * @var PaymentProduct863SpecificData
     */
    public $paymentProduct863SpecificData = null;

    /**
     * @var string
     */
    public $paymentProductGroup = null;

    /**
     * @var bool
     */
    public $usesRedirectionTo3rdParty = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'accountsOnFile')) {
            if (!is_array($object->accountsOnFile) && !is_object($object->accountsOnFile)) {
                throw new UnexpectedValueException('value \'' . print_r($object->accountsOnFile, true) . '\' is not an array or object');
            }
            $this->accountsOnFile = [];
            foreach ($object->accountsOnFile as $accountsOnFileElementObject) {
                $accountsOnFileElement = new AccountOnFile();
                $this->accountsOnFile[] = $accountsOnFileElement->fromObject($accountsOnFileElementObject);
            }
        }
        if (property_exists($object, 'allowsRecurring')) {
            $this->allowsRecurring = $object->allowsRecurring;
        }
        if (property_exists($object, 'allowsTokenization')) {
            $this->allowsTokenization = $object->allowsTokenization;
        }
        if (property_exists($object, 'authenticationIndicator')) {
            if (!is_object($object->authenticationIndicator)) {
                throw new UnexpectedValueException('value \'' . print_r($object->authenticationIndicator, true) . '\' is not an object');
            }
            $value = new AuthenticationIndicator();
            $this->authenticationIndicator = $value->fromObject($object->authenticationIndicator);
        }
        if (property_exists($object, 'autoTokenized')) {
            $this->autoTokenized = $object->autoTokenized;
        }
        if (property_exists($object, 'canBeIframed')) {
            $this->canBeIframed = $object->canBeIframed;
        }
        if (property_exists($object, 'deviceFingerprintEnabled')) {
            $this->deviceFingerprintEnabled = $object->deviceFingerprintEnabled;
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayHints, true) . '\' is not an object');
            }
            $value = new PaymentProductDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'fields')) {
            if (!is_array($object->fields) && !is_object($object->fields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fields, true) . '\' is not an array or object');
            }
            $this->fields = [];
            foreach ($object->fields as $fieldsElementObject) {
                $fieldsElement = new PaymentProductField();
                $this->fields[] = $fieldsElement->fromObject($fieldsElementObject);
            }
        }
        if (property_exists($object, 'fieldsWarning')) {
            $this->fieldsWarning = $object->fieldsWarning;
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'isJavaScriptRequired')) {
            $this->isJavaScriptRequired = $object->isJavaScriptRequired;
        }
        if (property_exists($object, 'maxAmount')) {
            $this->maxAmount = $object->maxAmount;
        }
        if (property_exists($object, 'minAmount')) {
            $this->minAmount = $object->minAmount;
        }
        if (property_exists($object, 'mobileIntegrationLevel')) {
            $this->mobileIntegrationLevel = $object->mobileIntegrationLevel;
        }
        if (property_exists($object, 'paymentMethod')) {
            $this->paymentMethod = $object->paymentMethod;
        }
        if (property_exists($object, 'paymentProduct302SpecificData')) {
            if (!is_object($object->paymentProduct302SpecificData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct302SpecificData, true) . '\' is not an object');
            }
            $value = new PaymentProduct302SpecificData();
            $this->paymentProduct302SpecificData = $value->fromObject($object->paymentProduct302SpecificData);
        }
        if (property_exists($object, 'paymentProduct320SpecificData')) {
            if (!is_object($object->paymentProduct320SpecificData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct320SpecificData, true) . '\' is not an object');
            }
            $value = new PaymentProduct320SpecificData();
            $this->paymentProduct320SpecificData = $value->fromObject($object->paymentProduct320SpecificData);
        }
        if (property_exists($object, 'paymentProduct863SpecificData')) {
            if (!is_object($object->paymentProduct863SpecificData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct863SpecificData, true) . '\' is not an object');
            }
            $value = new PaymentProduct863SpecificData();
            $this->paymentProduct863SpecificData = $value->fromObject($object->paymentProduct863SpecificData);
        }
        if (property_exists($object, 'paymentProductGroup')) {
            $this->paymentProductGroup = $object->paymentProductGroup;
        }
        if (property_exists($object, 'usesRedirectionTo3rdParty')) {
            $this->usesRedirectionTo3rdParty = $object->usesRedirectionTo3rdParty;
        }
        return $this;
    }
}
