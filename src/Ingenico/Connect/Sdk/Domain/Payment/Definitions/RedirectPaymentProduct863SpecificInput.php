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
class RedirectPaymentProduct863SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $integrationType = null;

    /**
     * @var string
     */
    public $openId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->integrationType)) {
            $object->integrationType = $this->integrationType;
        }
        if (!is_null($this->openId)) {
            $object->openId = $this->openId;
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
        if (property_exists($object, 'integrationType')) {
            $this->integrationType = $object->integrationType;
        }
        if (property_exists($object, 'openId')) {
            $this->openId = $object->openId;
        }
        return $this;
    }
}
