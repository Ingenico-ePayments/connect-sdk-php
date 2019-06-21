<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 */
class MerchantRiskAssessment extends DataObject
{
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
        if (property_exists($object, 'websiteUrl')) {
            $this->websiteUrl = $object->websiteUrl;
        }
        return $this;
    }
}
