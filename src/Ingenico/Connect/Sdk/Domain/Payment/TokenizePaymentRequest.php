<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class TokenizePaymentRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_TokenizePaymentRequest TokenizePaymentRequest
 */
class TokenizePaymentRequest extends DataObject
{
    /**
     * @var string
     */
    public $alias = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'alias')) {
            $this->alias = $object->alias;
        }
        return $this;
    }
}
