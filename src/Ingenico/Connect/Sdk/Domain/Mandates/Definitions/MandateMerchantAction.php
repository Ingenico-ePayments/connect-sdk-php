<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Mandates\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Mandates\Definitions
 */
class MandateMerchantAction extends DataObject
{
    /**
     * @var string
     */
    public $actionType = null;

    /**
     * @var MandateRedirectData
     */
    public $redirectData = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->actionType)) {
            $object->actionType = $this->actionType;
        }
        if (!is_null($this->redirectData)) {
            $object->redirectData = $this->redirectData->toObject();
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
        if (property_exists($object, 'redirectData')) {
            if (!is_object($object->redirectData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectData, true) . '\' is not an object');
            }
            $value = new MandateRedirectData();
            $this->redirectData = $value->fromObject($object->redirectData);
        }
        return $this;
    }
}
