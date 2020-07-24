<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 */
class MobilePaymentProductSession302SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $displayName = null;

    /**
     * @var string
     */
    public $domainName = null;

    /**
     * @var string
     */
    public $validationUrl = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->displayName)) {
            $object->displayName = $this->displayName;
        }
        if (!is_null($this->domainName)) {
            $object->domainName = $this->domainName;
        }
        if (!is_null($this->validationUrl)) {
            $object->validationUrl = $this->validationUrl;
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
        if (property_exists($object, 'displayName')) {
            $this->displayName = $object->displayName;
        }
        if (property_exists($object, 'domainName')) {
            $this->domainName = $object->domainName;
        }
        if (property_exists($object, 'validationUrl')) {
            $this->validationUrl = $object->validationUrl;
        }
        return $this;
    }
}
