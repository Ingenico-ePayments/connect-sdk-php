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
class AbstractThreeDSecure extends DataObject
{
    /**
     * @var string
     */
    public $authenticationFlow = null;

    /**
     * @var string
     */
    public $challengeCanvasSize = null;

    /**
     * @var string
     */
    public $challengeIndicator = null;

    /**
     * @var ThreeDSecureData
     */
    public $priorThreeDSecureData = null;

    /**
     * @var SdkDataInput
     */
    public $sdkData = null;

    /**
     * @var bool
     */
    public $skipAuthentication = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->authenticationFlow)) {
            $object->authenticationFlow = $this->authenticationFlow;
        }
        if (!is_null($this->challengeCanvasSize)) {
            $object->challengeCanvasSize = $this->challengeCanvasSize;
        }
        if (!is_null($this->challengeIndicator)) {
            $object->challengeIndicator = $this->challengeIndicator;
        }
        if (!is_null($this->priorThreeDSecureData)) {
            $object->priorThreeDSecureData = $this->priorThreeDSecureData->toObject();
        }
        if (!is_null($this->sdkData)) {
            $object->sdkData = $this->sdkData->toObject();
        }
        if (!is_null($this->skipAuthentication)) {
            $object->skipAuthentication = $this->skipAuthentication;
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
        if (property_exists($object, 'authenticationFlow')) {
            $this->authenticationFlow = $object->authenticationFlow;
        }
        if (property_exists($object, 'challengeCanvasSize')) {
            $this->challengeCanvasSize = $object->challengeCanvasSize;
        }
        if (property_exists($object, 'challengeIndicator')) {
            $this->challengeIndicator = $object->challengeIndicator;
        }
        if (property_exists($object, 'priorThreeDSecureData')) {
            if (!is_object($object->priorThreeDSecureData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->priorThreeDSecureData, true) . '\' is not an object');
            }
            $value = new ThreeDSecureData();
            $this->priorThreeDSecureData = $value->fromObject($object->priorThreeDSecureData);
        }
        if (property_exists($object, 'sdkData')) {
            if (!is_object($object->sdkData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sdkData, true) . '\' is not an object');
            }
            $value = new SdkDataInput();
            $this->sdkData = $value->fromObject($object->sdkData);
        }
        if (property_exists($object, 'skipAuthentication')) {
            $this->skipAuthentication = $object->skipAuthentication;
        }
        return $this;
    }
}
