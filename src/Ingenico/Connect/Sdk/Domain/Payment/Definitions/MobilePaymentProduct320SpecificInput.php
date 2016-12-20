<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class MobilePaymentProduct320SpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_MobilePaymentProduct320SpecificInput MobilePaymentProduct320SpecificInput
 */
class MobilePaymentProduct320SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $keyId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'keyId')) {
            $this->keyId = $object->keyId;
        }
        return $this;
    }
}
