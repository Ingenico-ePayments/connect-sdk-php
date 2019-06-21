<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class TokenEWallet extends AbstractToken
{
    /**
     * @var CustomerToken
     */
    public $customer = null;

    /**
     * @var TokenEWalletData
     */
    public $data = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->customer)) {
            $object->customer = $this->customer->toObject();
        }
        if (!is_null($this->data)) {
            $object->data = $this->data->toObject();
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
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new CustomerToken();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'data')) {
            if (!is_object($object->data)) {
                throw new UnexpectedValueException('value \'' . print_r($object->data, true) . '\' is not an object');
            }
            $value = new TokenEWalletData();
            $this->data = $value->fromObject($object->data);
        }
        return $this;
    }
}
