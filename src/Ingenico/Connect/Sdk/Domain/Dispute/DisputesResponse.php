<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Dispute;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Dispute\Definitions\Dispute;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Dispute
 */
class DisputesResponse extends DataObject
{
    /**
     * @var Dispute[]
     */
    public $disputes = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'disputes')) {
            if (!is_array($object->disputes) && !is_object($object->disputes)) {
                throw new UnexpectedValueException('value \'' . print_r($object->disputes, true) . '\' is not an array or object');
            }
            $this->disputes = [];
            foreach ($object->disputes as $disputesElementObject) {
                $disputesElement = new Dispute();
                $this->disputes[] = $disputesElement->fromObject($disputesElementObject);
            }
        }
        return $this;
    }
}
