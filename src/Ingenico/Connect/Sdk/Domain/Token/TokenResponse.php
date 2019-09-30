<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenCard;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenEWallet;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenNonSepaDirectDebit;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenSepaDirectDebit;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token
 */
class TokenResponse extends DataObject
{
    /**
     * @var TokenCard
     */
    public $card = null;

    /**
     * @var TokenEWallet
     */
    public $eWallet = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var TokenNonSepaDirectDebit
     */
    public $nonSepaDirectDebit = null;

    /**
     * @var string
     */
    public $originalPaymentId = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @var TokenSepaDirectDebit
     */
    public $sepaDirectDebit = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->card)) {
            $object->card = $this->card->toObject();
        }
        if (!is_null($this->eWallet)) {
            $object->eWallet = $this->eWallet->toObject();
        }
        if (!is_null($this->id)) {
            $object->id = $this->id;
        }
        if (!is_null($this->nonSepaDirectDebit)) {
            $object->nonSepaDirectDebit = $this->nonSepaDirectDebit->toObject();
        }
        if (!is_null($this->originalPaymentId)) {
            $object->originalPaymentId = $this->originalPaymentId;
        }
        if (!is_null($this->paymentProductId)) {
            $object->paymentProductId = $this->paymentProductId;
        }
        if (!is_null($this->sepaDirectDebit)) {
            $object->sepaDirectDebit = $this->sepaDirectDebit->toObject();
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
        if (property_exists($object, 'card')) {
            if (!is_object($object->card)) {
                throw new UnexpectedValueException('value \'' . print_r($object->card, true) . '\' is not an object');
            }
            $value = new TokenCard();
            $this->card = $value->fromObject($object->card);
        }
        if (property_exists($object, 'eWallet')) {
            if (!is_object($object->eWallet)) {
                throw new UnexpectedValueException('value \'' . print_r($object->eWallet, true) . '\' is not an object');
            }
            $value = new TokenEWallet();
            $this->eWallet = $value->fromObject($object->eWallet);
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'nonSepaDirectDebit')) {
            if (!is_object($object->nonSepaDirectDebit)) {
                throw new UnexpectedValueException('value \'' . print_r($object->nonSepaDirectDebit, true) . '\' is not an object');
            }
            $value = new TokenNonSepaDirectDebit();
            $this->nonSepaDirectDebit = $value->fromObject($object->nonSepaDirectDebit);
        }
        if (property_exists($object, 'originalPaymentId')) {
            $this->originalPaymentId = $object->originalPaymentId;
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        if (property_exists($object, 'sepaDirectDebit')) {
            if (!is_object($object->sepaDirectDebit)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebit, true) . '\' is not an object');
            }
            $value = new TokenSepaDirectDebit();
            $this->sepaDirectDebit = $value->fromObject($object->sepaDirectDebit);
        }
        return $this;
    }
}
