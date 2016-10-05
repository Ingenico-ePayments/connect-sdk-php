<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions\DisplayedData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PaymentCreationReferences;
use UnexpectedValueException;

/**
 * Class CreatedPaymentOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CreatedPaymentOutput CreatedPaymentOutput
 */
class CreatedPaymentOutput extends DataObject
{
    /**
     * @var DisplayedData
     */
    public $displayedData = null;

    /**
     * @var Payment
     */
    public $payment = null;

    /**
     * @var PaymentCreationReferences
     */
    public $paymentCreationReferences = null;

    /**
     * @var string
     */
    public $paymentStatusCategory = null;

    /**
     * @var string
     */
    public $tokens = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'displayedData')) {
            if (!is_object($object->displayedData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayedData, true) . '\' is not an object');
            }
            $value = new DisplayedData();
            $this->displayedData = $value->fromObject($object->displayedData);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        if (property_exists($object, 'paymentCreationReferences')) {
            if (!is_object($object->paymentCreationReferences)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentCreationReferences, true) . '\' is not an object');
            }
            $value = new PaymentCreationReferences();
            $this->paymentCreationReferences = $value->fromObject($object->paymentCreationReferences);
        }
        if (property_exists($object, 'paymentStatusCategory')) {
            $this->paymentStatusCategory = $object->paymentStatusCategory;
        }
        if (property_exists($object, 'tokens')) {
            $this->tokens = $object->tokens;
        }
        return $this;
    }
}
