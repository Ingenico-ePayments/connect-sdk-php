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
class CustomerAccountRiskAssessment extends DataObject
{
    /**
     * @var bool
     */
    public $hasForgottenPassword = null;

    /**
     * @var bool
     */
    public $hasPassword = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->hasForgottenPassword)) {
            $object->hasForgottenPassword = $this->hasForgottenPassword;
        }
        if (!is_null($this->hasPassword)) {
            $object->hasPassword = $this->hasPassword;
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
        if (property_exists($object, 'hasForgottenPassword')) {
            $this->hasForgottenPassword = $object->hasForgottenPassword;
        }
        if (property_exists($object, 'hasPassword')) {
            $this->hasPassword = $object->hasPassword;
        }
        return $this;
    }
}
