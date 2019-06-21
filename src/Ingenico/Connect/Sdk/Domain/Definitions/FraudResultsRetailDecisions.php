<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class FraudResultsRetailDecisions extends DataObject
{
    /**
     * @var string
     */
    public $fraudCode = null;

    /**
     * @var string
     */
    public $fraudNeural = null;

    /**
     * @var string
     */
    public $fraudRCF = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->fraudCode)) {
            $object->fraudCode = $this->fraudCode;
        }
        if (!is_null($this->fraudNeural)) {
            $object->fraudNeural = $this->fraudNeural;
        }
        if (!is_null($this->fraudRCF)) {
            $object->fraudRCF = $this->fraudRCF;
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
        if (property_exists($object, 'fraudCode')) {
            $this->fraudCode = $object->fraudCode;
        }
        if (property_exists($object, 'fraudNeural')) {
            $this->fraudNeural = $object->fraudNeural;
        }
        if (property_exists($object, 'fraudRCF')) {
            $this->fraudRCF = $object->fraudRCF;
        }
        return $this;
    }
}
