<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ApprovePaymentPaymentMethodSpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ApprovePaymentPaymentMethodSpecificInput ApprovePaymentPaymentMethodSpecificInput
 */
class ApprovePaymentPaymentMethodSpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $dateCollect = null;

    /**
     * @var string
     */
    public $token = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'dateCollect')) {
            $this->dateCollect = $object->dateCollect;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
