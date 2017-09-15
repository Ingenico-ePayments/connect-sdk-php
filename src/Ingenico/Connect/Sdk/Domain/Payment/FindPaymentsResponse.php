<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment
 */
class FindPaymentsResponse extends DataObject
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
     * @var Payment[]
     */
    public $payments = null;

    /**
     * @var int
     */
    public $totalCount = null;

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
        if (property_exists($object, 'payments')) {
            if (!is_array($object->payments) && !is_object($object->payments)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payments, true) . '\' is not an array or object');
            }
            $this->payments = [];
            foreach ($object->payments as $paymentsElementObject) {
                $paymentsElement = new Payment();
                $this->payments[] = $paymentsElement->fromObject($paymentsElementObject);
            }
        }
        if (property_exists($object, 'totalCount')) {
            $this->totalCount = $object->totalCount;
        }
        return $this;
    }
}
