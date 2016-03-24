<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\Card;

/**
 * Class CardPaymentMethodSpecificInput
 *
 * @package GCS\Payment\Definitions
 */
class CardPaymentMethodSpecificInput extends CardPaymentMethodSpecificInputBase
{
    /**
     * @var Card
     */
    public $card = null;

    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var string
     */
    public $returnUrl = null;

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
            $value = new Card();
            $this->card = $value->fromObject($object->card);
        }
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        return $this;
    }
}
