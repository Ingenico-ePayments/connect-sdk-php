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
class Merchant extends DataObject
{
    /**
     * @var string
     */
    public $contactWebsiteUrl = null;

    /**
     * @var Seller
     */
    public $seller = null;

    /**
     * @var string
     */
    public $websiteUrl = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->contactWebsiteUrl)) {
            $object->contactWebsiteUrl = $this->contactWebsiteUrl;
        }
        if (!is_null($this->seller)) {
            $object->seller = $this->seller->toObject();
        }
        if (!is_null($this->websiteUrl)) {
            $object->websiteUrl = $this->websiteUrl;
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
        if (property_exists($object, 'contactWebsiteUrl')) {
            $this->contactWebsiteUrl = $object->contactWebsiteUrl;
        }
        if (property_exists($object, 'seller')) {
            if (!is_object($object->seller)) {
                throw new UnexpectedValueException('value \'' . print_r($object->seller, true) . '\' is not an object');
            }
            $value = new Seller();
            $this->seller = $value->fromObject($object->seller);
        }
        if (property_exists($object, 'websiteUrl')) {
            $this->websiteUrl = $object->websiteUrl;
        }
        return $this;
    }
}
