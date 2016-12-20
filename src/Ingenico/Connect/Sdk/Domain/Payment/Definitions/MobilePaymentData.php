<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class MobilePaymentData
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_MobilePaymentData MobilePaymentData
 */
class MobilePaymentData extends DataObject
{
    /**
     * @var string
     */
    public $dpan = null;

    /**
     * @var string
     */
    public $expiryDate = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'dpan')) {
            $this->dpan = $object->dpan;
        }
        if (property_exists($object, 'expiryDate')) {
            $this->expiryDate = $object->expiryDate;
        }
        return $this;
    }
}
