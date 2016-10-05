<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class CashPaymentProduct1504SpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CashPaymentProduct1504SpecificInput CashPaymentProduct1504SpecificInput
 */
class CashPaymentProduct1504SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $returnUrl = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        return $this;
    }
}
