<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class FraudResults extends DataObject
{
    /**
     * @var string
     */
    public $fraudServiceResult = null;

    /**
     * @var InAuth
     */
    public $inAuth = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->fraudServiceResult)) {
            $object->fraudServiceResult = $this->fraudServiceResult;
        }
        if (!is_null($this->inAuth)) {
            $object->inAuth = $this->inAuth->toObject();
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
        if (property_exists($object, 'fraudServiceResult')) {
            $this->fraudServiceResult = $object->fraudServiceResult;
        }
        if (property_exists($object, 'inAuth')) {
            if (!is_object($object->inAuth)) {
                throw new UnexpectedValueException('value \'' . print_r($object->inAuth, true) . '\' is not an object');
            }
            $value = new InAuth();
            $this->inAuth = $value->fromObject($object->inAuth);
        }
        return $this;
    }
}
