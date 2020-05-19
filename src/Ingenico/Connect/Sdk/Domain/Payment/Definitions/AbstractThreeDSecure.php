<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class AbstractThreeDSecure extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $authenticationAmount = null;

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
     * @var string
     */
    public $exemptionRequest = null;

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
        if (!is_null($this->authenticationAmount)) {
            $object->authenticationAmount = $this->authenticationAmount->toObject();
        }
        if (!is_null($this->authenticationFlow)) {
            $object->authenticationFlow = $this->authenticationFlow;
        }
        if (!is_null($this->challengeCanvasSize)) {
            $object->challengeCanvasSize = $this->challengeCanvasSize;
        }
        if (!is_null($this->challengeIndicator)) {
            $object->challengeIndicator = $this->challengeIndicator;
        }
        if (!is_null($this->exemptionRequest)) {
            $object->exemptionRequest = $this->exemptionRequest;
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
        if (property_exists($object, 'authenticationAmount')) {
            if (!is_object($object->authenticationAmount)) {
                throw new UnexpectedValueException('value \'' . print_r($object->authenticationAmount, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->authenticationAmount = $value->fromObject($object->authenticationAmount);
        }
        if (property_exists($object, 'authenticationFlow')) {
            $this->authenticationFlow = $object->authenticationFlow;
        }
        if (property_exists($object, 'challengeCanvasSize')) {
            $this->challengeCanvasSize = $object->challengeCanvasSize;
        }
        if (property_exists($object, 'challengeIndicator')) {
            $this->challengeIndicator = $object->challengeIndicator;
        }
        if (property_exists($object, 'exemptionRequest')) {
            $this->exemptionRequest = $object->exemptionRequest;
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
