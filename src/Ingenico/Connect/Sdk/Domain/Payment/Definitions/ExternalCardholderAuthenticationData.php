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
class ExternalCardholderAuthenticationData extends DataObject
{
    /**
     * @var string
     */
    public $acsTransactionId = null;

    /**
     * @var string
     */
    public $appliedExemption = null;

    /**
     * @var string
     */
    public $cavv = null;

    /**
     * @var string
     */
    public $cavvAlgorithm = null;

    /**
     * @var string
     */
    public $directoryServerTransactionId = null;

    /**
     * @var int
     */
    public $eci = null;

    /**
     * @var int
     */
    public $schemeRiskScore = null;

    /**
     * @var string
     */
    public $threeDSecureVersion = null;

    /**
     * @var string
     * @deprecated No replacement
     */
    public $threeDServerTransactionId = null;

    /**
     * @var string
     */
    public $validationResult = null;

    /**
     * @var string
     */
    public $xid = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->acsTransactionId)) {
            $object->acsTransactionId = $this->acsTransactionId;
        }
        if (!is_null($this->appliedExemption)) {
            $object->appliedExemption = $this->appliedExemption;
        }
        if (!is_null($this->cavv)) {
            $object->cavv = $this->cavv;
        }
        if (!is_null($this->cavvAlgorithm)) {
            $object->cavvAlgorithm = $this->cavvAlgorithm;
        }
        if (!is_null($this->directoryServerTransactionId)) {
            $object->directoryServerTransactionId = $this->directoryServerTransactionId;
        }
        if (!is_null($this->eci)) {
            $object->eci = $this->eci;
        }
        if (!is_null($this->schemeRiskScore)) {
            $object->schemeRiskScore = $this->schemeRiskScore;
        }
        if (!is_null($this->threeDSecureVersion)) {
            $object->threeDSecureVersion = $this->threeDSecureVersion;
        }
        if (!is_null($this->threeDServerTransactionId)) {
            $object->threeDServerTransactionId = $this->threeDServerTransactionId;
        }
        if (!is_null($this->validationResult)) {
            $object->validationResult = $this->validationResult;
        }
        if (!is_null($this->xid)) {
            $object->xid = $this->xid;
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
        if (property_exists($object, 'acsTransactionId')) {
            $this->acsTransactionId = $object->acsTransactionId;
        }
        if (property_exists($object, 'appliedExemption')) {
            $this->appliedExemption = $object->appliedExemption;
        }
        if (property_exists($object, 'cavv')) {
            $this->cavv = $object->cavv;
        }
        if (property_exists($object, 'cavvAlgorithm')) {
            $this->cavvAlgorithm = $object->cavvAlgorithm;
        }
        if (property_exists($object, 'directoryServerTransactionId')) {
            $this->directoryServerTransactionId = $object->directoryServerTransactionId;
        }
        if (property_exists($object, 'eci')) {
            $this->eci = $object->eci;
        }
        if (property_exists($object, 'schemeRiskScore')) {
            $this->schemeRiskScore = $object->schemeRiskScore;
        }
        if (property_exists($object, 'threeDSecureVersion')) {
            $this->threeDSecureVersion = $object->threeDSecureVersion;
        }
        if (property_exists($object, 'threeDServerTransactionId')) {
            $this->threeDServerTransactionId = $object->threeDServerTransactionId;
        }
        if (property_exists($object, 'validationResult')) {
            $this->validationResult = $object->validationResult;
        }
        if (property_exists($object, 'xid')) {
            $this->xid = $object->xid;
        }
        return $this;
    }
}
