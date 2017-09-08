<?php
namespace Ingenico\Connect\Sdk\Domain\Webhooks;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payout\PayoutResponse;
use Ingenico\Connect\Sdk\Domain\Refund\RefundResponse;
use Ingenico\Connect\Sdk\Domain\Token\TokenResponse;
use UnexpectedValueException;

/**
 * class WebhooksEvent
 *
 * @package Ingenico\Connect\Sdk\Domain\Webhooks
 */
class WebhooksEvent extends DataObject
{
    /**
     * @var string
     */
    public $apiVersion = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $created = null;

    /**
     * @var string
     */
    public $merchantId = null;

    /**
     * @var string
     */
    public $type = null;

    /**
     * @var PaymentResponse
     */
    public $payment = null;

    /**
     * @var RefundResponse
     */
    public $refund = null;

    /**
     * @var PayoutResponse
     */
    public $payout = null;

    /**
     * @var TokenResponse
     */
    public $token = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'apiVersion')) {
            $this->apiVersion = $object->apiVersion;
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'created')) {
            $this->created = $object->created;
        }
        if (property_exists($object, 'merchantId')) {
            $this->merchantId = $object->merchantId;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new PaymentResponse();
            $this->payment = $value->fromObject($object->payment);
        }
        if (property_exists($object, 'refund')) {
            if (!is_object($object->refund)) {
                throw new UnexpectedValueException('value \'' . print_r($object->refund, true) . '\' is not an object');
            }
            $value = new RefundResponse();
            $this->refund = $value->fromObject($object->refund);
        }
        if (property_exists($object, 'payout')) {
            if (!is_object($object->payout)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payout, true) . '\' is not an object');
            }
            $value = new PayoutResponse();
            $this->payout = $value->fromObject($object->payout);
        }
        if (property_exists($object, 'token')) {
            if (!is_object($object->token)) {
                throw new UnexpectedValueException('value \'' . print_r($object->token, true) . '\' is not an object');
            }
            $value = new TokenResponse();
            $this->token = $value->fromObject($object->token);
        }
        return $this;
    }
}
