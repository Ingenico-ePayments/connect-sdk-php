<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class ThreeDSecure extends AbstractThreeDSecure
{
    /**
     * @var ExternalCardholderAuthenticationData
     */
    public $externalCardholderAuthenticationData = null;

    /**
     * @var RedirectionData
     */
    public $redirectionData = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->externalCardholderAuthenticationData)) {
            $object->externalCardholderAuthenticationData = $this->externalCardholderAuthenticationData->toObject();
        }
        if (!is_null($this->redirectionData)) {
            $object->redirectionData = $this->redirectionData->toObject();
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
        if (property_exists($object, 'externalCardholderAuthenticationData')) {
            if (!is_object($object->externalCardholderAuthenticationData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->externalCardholderAuthenticationData, true) . '\' is not an object');
            }
            $value = new ExternalCardholderAuthenticationData();
            $this->externalCardholderAuthenticationData = $value->fromObject($object->externalCardholderAuthenticationData);
        }
        if (property_exists($object, 'redirectionData')) {
            if (!is_object($object->redirectionData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectionData, true) . '\' is not an object');
            }
            $value = new RedirectionData();
            $this->redirectionData = $value->fromObject($object->redirectionData);
        }
        return $this;
    }
}
