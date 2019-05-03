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
class ThreeDSecureResults extends DataObject
{
    /**
     * @var string
     */
    public $cavv = null;

    /**
     * @var string
     */
    public $directoryServerTransactionId = null;

    /**
     * @var string
     */
    public $eci = null;

    /**
     * @var SdkDataOutput
     */
    public $sdkData = null;

    /**
     * @var ThreeDSecureData
     */
    public $threeDSecureData = null;

    /**
     * @var string
     */
    public $threeDSecureVersion = null;

    /**
     * @var string
     */
    public $threeDServerTransactionId = null;

    /**
     * @var string
     */
    public $xid = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'cavv')) {
            $this->cavv = $object->cavv;
        }
        if (property_exists($object, 'directoryServerTransactionId')) {
            $this->directoryServerTransactionId = $object->directoryServerTransactionId;
        }
        if (property_exists($object, 'eci')) {
            $this->eci = $object->eci;
        }
        if (property_exists($object, 'sdkData')) {
            if (!is_object($object->sdkData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sdkData, true) . '\' is not an object');
            }
            $value = new SdkDataOutput();
            $this->sdkData = $value->fromObject($object->sdkData);
        }
        if (property_exists($object, 'threeDSecureData')) {
            if (!is_object($object->threeDSecureData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->threeDSecureData, true) . '\' is not an object');
            }
            $value = new ThreeDSecureData();
            $this->threeDSecureData = $value->fromObject($object->threeDSecureData);
        }
        if (property_exists($object, 'threeDSecureVersion')) {
            $this->threeDSecureVersion = $object->threeDSecureVersion;
        }
        if (property_exists($object, 'threeDServerTransactionId')) {
            $this->threeDServerTransactionId = $object->threeDServerTransactionId;
        }
        if (property_exists($object, 'xid')) {
            $this->xid = $object->xid;
        }
        return $this;
    }
}
