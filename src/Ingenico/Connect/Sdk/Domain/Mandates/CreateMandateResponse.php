<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Mandates;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Mandates\Definitions\MandateMerchantAction;
use Ingenico\Connect\Sdk\Domain\Mandates\Definitions\MandateResponse;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Mandates
 */
class CreateMandateResponse extends DataObject
{
    /**
     * @var MandateResponse
     */
    public $mandate = null;

    /**
     * @var MandateMerchantAction
     */
    public $merchantAction = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->mandate)) {
            $object->mandate = $this->mandate->toObject();
        }
        if (!is_null($this->merchantAction)) {
            $object->merchantAction = $this->merchantAction->toObject();
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
        if (property_exists($object, 'mandate')) {
            if (!is_object($object->mandate)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mandate, true) . '\' is not an object');
            }
            $value = new MandateResponse();
            $this->mandate = $value->fromObject($object->mandate);
        }
        if (property_exists($object, 'merchantAction')) {
            if (!is_object($object->merchantAction)) {
                throw new UnexpectedValueException('value \'' . print_r($object->merchantAction, true) . '\' is not an object');
            }
            $value = new MandateMerchantAction();
            $this->merchantAction = $value->fromObject($object->merchantAction);
        }
        return $this;
    }
}
