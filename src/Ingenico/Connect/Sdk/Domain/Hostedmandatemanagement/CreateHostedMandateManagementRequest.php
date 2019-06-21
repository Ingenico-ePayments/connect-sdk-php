<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\Definitions\HostedMandateInfo;
use Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\Definitions\HostedMandateManagementSpecificInput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement
 */
class CreateHostedMandateManagementRequest extends DataObject
{
    /**
     * @var HostedMandateInfo
     */
    public $createMandateInfo = null;

    /**
     * @var HostedMandateManagementSpecificInput
     */
    public $hostedMandateManagementSpecificInput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->createMandateInfo)) {
            $object->createMandateInfo = $this->createMandateInfo->toObject();
        }
        if (!is_null($this->hostedMandateManagementSpecificInput)) {
            $object->hostedMandateManagementSpecificInput = $this->hostedMandateManagementSpecificInput->toObject();
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
        if (property_exists($object, 'createMandateInfo')) {
            if (!is_object($object->createMandateInfo)) {
                throw new UnexpectedValueException('value \'' . print_r($object->createMandateInfo, true) . '\' is not an object');
            }
            $value = new HostedMandateInfo();
            $this->createMandateInfo = $value->fromObject($object->createMandateInfo);
        }
        if (property_exists($object, 'hostedMandateManagementSpecificInput')) {
            if (!is_object($object->hostedMandateManagementSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->hostedMandateManagementSpecificInput, true) . '\' is not an object');
            }
            $value = new HostedMandateManagementSpecificInput();
            $this->hostedMandateManagementSpecificInput = $value->fromObject($object->hostedMandateManagementSpecificInput);
        }
        return $this;
    }
}
