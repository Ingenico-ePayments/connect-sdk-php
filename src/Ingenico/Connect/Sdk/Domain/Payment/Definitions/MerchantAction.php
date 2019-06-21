<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\KeyValuePair;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductField;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class MerchantAction extends DataObject
{
    /**
     * @var string
     */
    public $actionType = null;

    /**
     * @var PaymentProductField[]
     */
    public $formFields = null;

    /**
     * @var MobileThreeDSecureChallengeParameters
     */
    public $mobileThreeDSecureChallengeParameters = null;

    /**
     * @var RedirectData
     */
    public $redirectData = null;

    /**
     * @var string
     */
    public $renderingData = null;

    /**
     * @var KeyValuePair[]
     */
    public $showData = null;

    /**
     * @var ThirdPartyData
     */
    public $thirdPartyData = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->actionType)) {
            $object->actionType = $this->actionType;
        }
        if (!is_null($this->formFields)) {
            $object->formFields = [];
            foreach ($this->formFields as $element) {
                if (!is_null($element)) {
                    $object->formFields[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->mobileThreeDSecureChallengeParameters)) {
            $object->mobileThreeDSecureChallengeParameters = $this->mobileThreeDSecureChallengeParameters->toObject();
        }
        if (!is_null($this->redirectData)) {
            $object->redirectData = $this->redirectData->toObject();
        }
        if (!is_null($this->renderingData)) {
            $object->renderingData = $this->renderingData;
        }
        if (!is_null($this->showData)) {
            $object->showData = [];
            foreach ($this->showData as $element) {
                if (!is_null($element)) {
                    $object->showData[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->thirdPartyData)) {
            $object->thirdPartyData = $this->thirdPartyData->toObject();
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
        if (property_exists($object, 'actionType')) {
            $this->actionType = $object->actionType;
        }
        if (property_exists($object, 'formFields')) {
            if (!is_array($object->formFields) && !is_object($object->formFields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->formFields, true) . '\' is not an array or object');
            }
            $this->formFields = [];
            foreach ($object->formFields as $element) {
                $value = new PaymentProductField();
                $this->formFields[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'mobileThreeDSecureChallengeParameters')) {
            if (!is_object($object->mobileThreeDSecureChallengeParameters)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mobileThreeDSecureChallengeParameters, true) . '\' is not an object');
            }
            $value = new MobileThreeDSecureChallengeParameters();
            $this->mobileThreeDSecureChallengeParameters = $value->fromObject($object->mobileThreeDSecureChallengeParameters);
        }
        if (property_exists($object, 'redirectData')) {
            if (!is_object($object->redirectData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectData, true) . '\' is not an object');
            }
            $value = new RedirectData();
            $this->redirectData = $value->fromObject($object->redirectData);
        }
        if (property_exists($object, 'renderingData')) {
            $this->renderingData = $object->renderingData;
        }
        if (property_exists($object, 'showData')) {
            if (!is_array($object->showData) && !is_object($object->showData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->showData, true) . '\' is not an array or object');
            }
            $this->showData = [];
            foreach ($object->showData as $element) {
                $value = new KeyValuePair();
                $this->showData[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'thirdPartyData')) {
            if (!is_object($object->thirdPartyData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->thirdPartyData, true) . '\' is not an object');
            }
            $value = new ThirdPartyData();
            $this->thirdPartyData = $value->fromObject($object->thirdPartyData);
        }
        return $this;
    }
}
