<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class PaymentProductNetworksResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Product
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProductNetworksResponse PaymentProductNetworksResponse
 */
class PaymentProductNetworksResponse extends DataObject
{
    /**
     * @var string[]
     */
    public $networks = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'networks')) {
            if (!is_array($object->networks) && !is_object($object->networks)) {
                throw new UnexpectedValueException('value \'' . print_r($object->networks, true) . '\' is not an array or object');
            }
            $this->networks = [];
            foreach ($object->networks as $networksElementObject) {
                $this->networks[] = $networksElementObject;
            }
        }
        return $this;
    }
}
