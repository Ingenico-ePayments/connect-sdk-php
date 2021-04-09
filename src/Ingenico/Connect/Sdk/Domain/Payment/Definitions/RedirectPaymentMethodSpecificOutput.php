<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Definitions\FraudResults;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class RedirectPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var BankAccountBban
     */
    public $bankAccountBban = null;

    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var string
     */
    public $bic = null;

    /**
     * @var FraudResults
     */
    public $fraudResults = null;

    /**
     * @var PaymentProduct3201SpecificOutput
     */
    public $paymentProduct3201SpecificOutput = null;

    /**
     * @var PaymentProduct806SpecificOutput
     */
    public $paymentProduct806SpecificOutput = null;

    /**
     * @var PaymentProduct836SpecificOutput
     */
    public $paymentProduct836SpecificOutput = null;

    /**
     * @var PaymentProduct840SpecificOutput
     */
    public $paymentProduct840SpecificOutput = null;

    /**
     * @var string
     */
    public $token = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->bankAccountBban)) {
            $object->bankAccountBban = $this->bankAccountBban->toObject();
        }
        if (!is_null($this->bankAccountIban)) {
            $object->bankAccountIban = $this->bankAccountIban->toObject();
        }
        if (!is_null($this->bic)) {
            $object->bic = $this->bic;
        }
        if (!is_null($this->fraudResults)) {
            $object->fraudResults = $this->fraudResults->toObject();
        }
        if (!is_null($this->paymentProduct3201SpecificOutput)) {
            $object->paymentProduct3201SpecificOutput = $this->paymentProduct3201SpecificOutput->toObject();
        }
        if (!is_null($this->paymentProduct806SpecificOutput)) {
            $object->paymentProduct806SpecificOutput = $this->paymentProduct806SpecificOutput->toObject();
        }
        if (!is_null($this->paymentProduct836SpecificOutput)) {
            $object->paymentProduct836SpecificOutput = $this->paymentProduct836SpecificOutput->toObject();
        }
        if (!is_null($this->paymentProduct840SpecificOutput)) {
            $object->paymentProduct840SpecificOutput = $this->paymentProduct840SpecificOutput->toObject();
        }
        if (!is_null($this->token)) {
            $object->token = $this->token;
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
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountBban, true) . '\' is not an object');
            }
            $value = new BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'bic')) {
            $this->bic = $object->bic;
        }
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudResults, true) . '\' is not an object');
            }
            $value = new FraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
        if (property_exists($object, 'paymentProduct3201SpecificOutput')) {
            if (!is_object($object->paymentProduct3201SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct3201SpecificOutput, true) . '\' is not an object');
            }
            $value = new PaymentProduct3201SpecificOutput();
            $this->paymentProduct3201SpecificOutput = $value->fromObject($object->paymentProduct3201SpecificOutput);
        }
        if (property_exists($object, 'paymentProduct806SpecificOutput')) {
            if (!is_object($object->paymentProduct806SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct806SpecificOutput, true) . '\' is not an object');
            }
            $value = new PaymentProduct806SpecificOutput();
            $this->paymentProduct806SpecificOutput = $value->fromObject($object->paymentProduct806SpecificOutput);
        }
        if (property_exists($object, 'paymentProduct836SpecificOutput')) {
            if (!is_object($object->paymentProduct836SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct836SpecificOutput, true) . '\' is not an object');
            }
            $value = new PaymentProduct836SpecificOutput();
            $this->paymentProduct836SpecificOutput = $value->fromObject($object->paymentProduct836SpecificOutput);
        }
        if (property_exists($object, 'paymentProduct840SpecificOutput')) {
            if (!is_object($object->paymentProduct840SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct840SpecificOutput, true) . '\' is not an object');
            }
            $value = new PaymentProduct840SpecificOutput();
            $this->paymentProduct840SpecificOutput = $value->fromObject($object->paymentProduct840SpecificOutput);
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
