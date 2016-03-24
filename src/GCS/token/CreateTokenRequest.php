<?php
namespace GCS\token;

use GCS\DataObject;

/**
 * Class CreateTokenRequest
 *
 * @package GCS\token
 */
class CreateTokenRequest extends DataObject
{
    /**
     * @var definitions\TokenCard
     */
    public $card = null;

    /**
     * @var definitions\TokenEWallet
     */
    public $eWallet = null;

    /**
     * @var definitions\TokenNonSepaDirectDebit
     */
    public $nonSepaDirectDebit = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @var definitions\TokenSepaDirectDebitWithoutCreditor
     */
    public $sepaDirectDebit = null;

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
        if (property_exists($object, 'card')) {
            if (!is_object($object->card)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->card, true) . '\' is not an object'
                );
            }
            $value = new definitions\TokenCard();
            $this->card = $value->fromObject($object->card);
        }
        if (property_exists($object, 'eWallet')) {
            if (!is_object($object->eWallet)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->eWallet, true) . '\' is not an object'
                );
            }
            $value = new definitions\TokenEWallet();
            $this->eWallet = $value->fromObject($object->eWallet);
        }
        if (property_exists($object, 'nonSepaDirectDebit')) {
            if (!is_object($object->nonSepaDirectDebit)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->nonSepaDirectDebit, true) . '\' is not an object'
                );
            }
            $value = new definitions\TokenNonSepaDirectDebit();
            $this->nonSepaDirectDebit = $value->fromObject($object->nonSepaDirectDebit);
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        if (property_exists($object, 'sepaDirectDebit')) {
            if (!is_object($object->sepaDirectDebit)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->sepaDirectDebit, true) . '\' is not an object'
                );
            }
            $value = new definitions\TokenSepaDirectDebitWithoutCreditor();
            $this->sepaDirectDebit = $value->fromObject($object->sepaDirectDebit);
        }
        return $this;
    }
}
