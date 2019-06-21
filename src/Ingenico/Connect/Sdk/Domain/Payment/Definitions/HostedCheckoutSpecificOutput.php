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
class HostedCheckoutSpecificOutput extends DataObject
{
    /**
     * @var string
     */
    public $hostedCheckoutId = null;

    /**
     * @var string
     */
    public $variant = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->hostedCheckoutId)) {
            $object->hostedCheckoutId = $this->hostedCheckoutId;
        }
        if (!is_null($this->variant)) {
            $object->variant = $this->variant;
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
        if (property_exists($object, 'hostedCheckoutId')) {
            $this->hostedCheckoutId = $object->hostedCheckoutId;
        }
        if (property_exists($object, 'variant')) {
            $this->variant = $object->variant;
        }
        return $this;
    }
}
