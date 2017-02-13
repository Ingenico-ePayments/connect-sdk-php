<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\AccountOnFile;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductDisplayHints;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductField;
use UnexpectedValueException;

/**
 * Class PaymentProduct
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProduct PaymentProduct
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
     * @var bool
     */
    public $autoTokenized = null;

    /**
     * @var bool
     */
    public $canBeIframed = null;

    /**
     * @var PaymentProductDisplayHints
     */
    public $displayHints = null;

    /**
     * @var PaymentProductField[]
     */
    public $fields = null;

    /**
     * @var int
     */
    public $id = null;

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
        if (property_exists($object, 'autoTokenized')) {
            $this->autoTokenized = $object->autoTokenized;
        }
        if (property_exists($object, 'canBeIframed')) {
            $this->canBeIframed = $object->canBeIframed;
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
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
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
        if (property_exists($object, 'paymentProductGroup')) {
            $this->paymentProductGroup = $object->paymentProductGroup;
        }
        if (property_exists($object, 'usesRedirectionTo3rdParty')) {
            $this->usesRedirectionTo3rdParty = $object->usesRedirectionTo3rdParty;
        }
        return $this;
    }
}
