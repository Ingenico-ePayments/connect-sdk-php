<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Publickey;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class PublicKey
 *
 * @package Ingenico\Connect\Sdk\Domain\Publickey
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PublicKey PublicKey
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
