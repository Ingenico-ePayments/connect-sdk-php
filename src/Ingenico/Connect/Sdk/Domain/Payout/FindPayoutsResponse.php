<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payout;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payout
 */
class FindPayoutsResponse extends DataObject
{
    /**
     * @var int
     */
    public $limit = null;

    /**
     * @var int
     */
    public $offset = null;

    /**
     * @var PayoutResult[]
     */
    public $payouts = null;

    /**
     * @var int
     */
    public $totalCount = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->limit)) {
            $object->limit = $this->limit;
        }
        if (!is_null($this->offset)) {
            $object->offset = $this->offset;
        }
        if (!is_null($this->payouts)) {
            $object->payouts = [];
            foreach ($this->payouts as $element) {
                if (!is_null($element)) {
                    $object->payouts[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->totalCount)) {
            $object->totalCount = $this->totalCount;
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
        if (property_exists($object, 'limit')) {
            $this->limit = $object->limit;
        }
        if (property_exists($object, 'offset')) {
            $this->offset = $object->offset;
        }
        if (property_exists($object, 'payouts')) {
            if (!is_array($object->payouts) && !is_object($object->payouts)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payouts, true) . '\' is not an array or object');
            }
            $this->payouts = [];
            foreach ($object->payouts as $element) {
                $value = new PayoutResult();
                $this->payouts[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'totalCount')) {
            $this->totalCount = $object->totalCount;
        }
        return $this;
    }
}
