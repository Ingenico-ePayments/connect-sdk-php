<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\Card;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CardPaymentMethodSpecificInputBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ExternalCardholderAuthenticationData;
use UnexpectedValueException;

/**
 * Class CardPaymentMethodSpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CardPaymentMethodSpecificInput CardPaymentMethodSpecificInput
 */
class CardPaymentMethodSpecificInput extends CardPaymentMethodSpecificInputBase
{
    /**
     * @var Card
     */
    public $card = null;

    /**
     * @var ExternalCardholderAuthenticationData
     */
    public $externalCardholderAuthenticationData = null;

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
            $value = new Card();
            $this->card = $value->fromObject($object->card);
        }
        if (property_exists($object, 'externalCardholderAuthenticationData')) {
            if (!is_object($object->externalCardholderAuthenticationData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->externalCardholderAuthenticationData, true) . '\' is not an object');
            }
            $value = new ExternalCardholderAuthenticationData();
            $this->externalCardholderAuthenticationData = $value->fromObject($object->externalCardholderAuthenticationData);
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
