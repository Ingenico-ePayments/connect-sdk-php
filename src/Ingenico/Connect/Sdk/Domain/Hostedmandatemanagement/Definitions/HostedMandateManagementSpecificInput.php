<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\Definitions
 */
class HostedMandateManagementSpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $locale = null;

    /**
     * @var string
     */
    public $returnUrl = null;

    /**
     * @var bool
     */
    public $showResultPage = null;

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
        if (!is_null($this->locale)) {
            $object->locale = $this->locale;
        }
        if (!is_null($this->returnUrl)) {
            $object->returnUrl = $this->returnUrl;
        }
        if (!is_null($this->showResultPage)) {
            $object->showResultPage = $this->showResultPage;
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
        if (property_exists($object, 'locale')) {
            $this->locale = $object->locale;
        }
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        if (property_exists($object, 'showResultPage')) {
            $this->showResultPage = $object->showResultPage;
        }
        if (property_exists($object, 'variant')) {
            $this->variant = $object->variant;
        }
        return $this;
    }
}
