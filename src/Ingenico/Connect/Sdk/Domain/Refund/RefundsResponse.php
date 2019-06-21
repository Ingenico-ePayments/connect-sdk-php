<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Refund
 */
class RefundsResponse extends DataObject
{
    /**
     * @var RefundResult[]
     */
    public $refunds = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->refunds)) {
            $object->refunds = [];
            foreach ($this->refunds as $element) {
                if (!is_null($element)) {
                    $object->refunds[] = $element->toObject();
                }
            }
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
        if (property_exists($object, 'refunds')) {
            if (!is_array($object->refunds) && !is_object($object->refunds)) {
                throw new UnexpectedValueException('value \'' . print_r($object->refunds, true) . '\' is not an array or object');
            }
            $this->refunds = [];
            foreach ($object->refunds as $element) {
                $value = new RefundResult();
                $this->refunds[] = $value->fromObject($element);
            }
        }
        return $this;
    }
}
