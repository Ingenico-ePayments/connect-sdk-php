<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Publickey;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Publickey
 */
class PublicKey extends DataObject
{
    /**
     * @var string
     */
    public $keyId = null;

    /**
     * @var string
     */
    public $publicKey = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'keyId')) {
            $this->keyId = $object->keyId;
        }
        if (property_exists($object, 'publicKey')) {
            $this->publicKey = $object->publicKey;
        }
        return $this;
    }
}
