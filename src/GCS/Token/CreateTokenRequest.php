<?php
namespace GCS\Token;

use GCS\DataObject;

/**
 * Class CreateTokenRequest
 *
 * @package GCS\Token
 */
class CreateTokenRequest extends DataObject
{
    /**
     * @var Definitions\TokenCard
     */
    public $card = null;

    /**
     * @var Definitions\TokenEWallet
     */
    public $eWallet = null;

    /**
     * @var Definitions\TokenNonSepaDirectDebit
     */
    public $nonSepaDirectDebit = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @var Definitions\TokenSepaDirectDebitWithoutCreditor
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
            $value = new Definitions\TokenCard();
            $this->card = $value->fromObject($object->card);
        }
        if (property_exists($object, 'eWallet')) {
            if (!is_object($object->eWallet)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->eWallet, true) . '\' is not an object'
                );
            }
            $value = new Definitions\TokenEWallet();
            $this->eWallet = $value->fromObject($object->eWallet);
        }
        if (property_exists($object, 'nonSepaDirectDebit')) {
            if (!is_object($object->nonSepaDirectDebit)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->nonSepaDirectDebit, true) . '\' is not an object'
                );
            }
            $value = new Definitions\TokenNonSepaDirectDebit();
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
            $value = new Definitions\TokenSepaDirectDebitWithoutCreditor();
            $this->sepaDirectDebit = $value->fromObject($object->sepaDirectDebit);
        }
        return $this;
    }
}
