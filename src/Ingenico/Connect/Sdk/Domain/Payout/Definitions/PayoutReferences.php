<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class PayoutReferences
 *
 * @package Ingenico\Connect\Sdk\Domain\Payout\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PayoutReferences PayoutReferences
 */
class PayoutReferences extends DataObject
{
    /**
     * @var string
     */
    public $invoiceNumber = null;

    /**
     * @var int
     */
    public $merchantOrderId = null;

    /**
     * @var string
     */
    public $merchantReference = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'invoiceNumber')) {
            $this->invoiceNumber = $object->invoiceNumber;
        }
        if (property_exists($object, 'merchantOrderId')) {
            $this->merchantOrderId = $object->merchantOrderId;
        }
        if (property_exists($object, 'merchantReference')) {
            $this->merchantReference = $object->merchantReference;
        }
        return $this;
    }
}
