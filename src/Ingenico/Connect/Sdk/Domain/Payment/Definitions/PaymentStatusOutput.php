<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\KeyValuePair;
use Ingenico\Connect\Sdk\Domain\Definitions\OrderStatusOutput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class PaymentStatusOutput extends OrderStatusOutput
{
    /**
     * @var bool
     */
    public $isAuthorized = null;

    /**
     * @var bool
     */
    public $isRefundable = null;

    /**
     * @var bool
     */
    public $isRetriable = null;

    /**
     * @var KeyValuePair[]
     */
    public $providerRawOutput = null;

    /**
     * @var string
     */
    public $threeDSecureStatus = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->isAuthorized)) {
            $object->isAuthorized = $this->isAuthorized;
        }
        if (!is_null($this->isRefundable)) {
            $object->isRefundable = $this->isRefundable;
        }
        if (!is_null($this->isRetriable)) {
            $object->isRetriable = $this->isRetriable;
        }
        if (!is_null($this->providerRawOutput)) {
            $object->providerRawOutput = [];
            foreach ($this->providerRawOutput as $element) {
                if (!is_null($element)) {
                    $object->providerRawOutput[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->threeDSecureStatus)) {
            $object->threeDSecureStatus = $this->threeDSecureStatus;
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
        if (property_exists($object, 'isAuthorized')) {
            $this->isAuthorized = $object->isAuthorized;
        }
        if (property_exists($object, 'isRefundable')) {
            $this->isRefundable = $object->isRefundable;
        }
        if (property_exists($object, 'isRetriable')) {
            $this->isRetriable = $object->isRetriable;
        }
        if (property_exists($object, 'providerRawOutput')) {
            if (!is_array($object->providerRawOutput) && !is_object($object->providerRawOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->providerRawOutput, true) . '\' is not an array or object');
            }
            $this->providerRawOutput = [];
            foreach ($object->providerRawOutput as $element) {
                $value = new KeyValuePair();
                $this->providerRawOutput[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'threeDSecureStatus')) {
            $this->threeDSecureStatus = $object->threeDSecureStatus;
        }
        return $this;
    }
}
