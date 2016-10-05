<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenCard;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenEWallet;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenNonSepaDirectDebit;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenSepaDirectDebit;
use UnexpectedValueException;

/**
 * Class TokenResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Token
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_TokenResponse TokenResponse
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
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @var TokenSepaDirectDebit
     */
    public $sepaDirectDebit = null;

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
