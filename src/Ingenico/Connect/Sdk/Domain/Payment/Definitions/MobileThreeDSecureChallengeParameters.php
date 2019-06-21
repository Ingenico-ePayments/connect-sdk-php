<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class MobileThreeDSecureChallengeParameters extends DataObject
{
    /**
     * @var string
     */
    public $acsReferenceNumber = null;

    /**
     * @var string
     */
    public $acsSignedContent = null;

    /**
     * @var string
     */
    public $acsTransactionId = null;

    /**
     * @var string
     */
    public $threeDServerTransactionId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->acsReferenceNumber)) {
            $object->acsReferenceNumber = $this->acsReferenceNumber;
        }
        if (!is_null($this->acsSignedContent)) {
            $object->acsSignedContent = $this->acsSignedContent;
        }
        if (!is_null($this->acsTransactionId)) {
            $object->acsTransactionId = $this->acsTransactionId;
        }
        if (!is_null($this->threeDServerTransactionId)) {
            $object->threeDServerTransactionId = $this->threeDServerTransactionId;
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
        if (property_exists($object, 'acsReferenceNumber')) {
            $this->acsReferenceNumber = $object->acsReferenceNumber;
        }
        if (property_exists($object, 'acsSignedContent')) {
            $this->acsSignedContent = $object->acsSignedContent;
        }
        if (property_exists($object, 'acsTransactionId')) {
            $this->acsTransactionId = $object->acsTransactionId;
        }
        if (property_exists($object, 'threeDServerTransactionId')) {
            $this->threeDServerTransactionId = $object->threeDServerTransactionId;
        }
        return $this;
    }
}
