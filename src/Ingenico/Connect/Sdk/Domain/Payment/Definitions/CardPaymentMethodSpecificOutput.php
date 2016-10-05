<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\CardEssentials;
use Ingenico\Connect\Sdk\Domain\Definitions\CardFraudResults;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AbstractPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ThreeDSecureResults;
use UnexpectedValueException;

/**
 * Class CardPaymentMethodSpecificOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CardPaymentMethodSpecificOutput CardPaymentMethodSpecificOutput
 */
class CardPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var string
     */
    public $authorisationCode = null;

    /**
     * @var CardEssentials
     */
    public $card = null;

    /**
     * @var CardFraudResults
     */
    public $fraudResults = null;

    /**
     * @var ThreeDSecureResults
     */
    public $threeDSecureResults = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'authorisationCode')) {
            $this->authorisationCode = $object->authorisationCode;
        }
        if (property_exists($object, 'card')) {
            if (!is_object($object->card)) {
                throw new UnexpectedValueException('value \'' . print_r($object->card, true) . '\' is not an object');
            }
            $value = new CardEssentials();
            $this->card = $value->fromObject($object->card);
        }
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudResults, true) . '\' is not an object');
            }
            $value = new CardFraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
        if (property_exists($object, 'threeDSecureResults')) {
            if (!is_object($object->threeDSecureResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->threeDSecureResults, true) . '\' is not an object');
            }
            $value = new ThreeDSecureResults();
            $this->threeDSecureResults = $value->fromObject($object->threeDSecureResults);
        }
        return $this;
    }
}
