<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class PaymentCreationOutput extends PaymentCreationReferences
{
    /**
     * @var bool
     */
    public $isNewToken = null;

    /**
     * @var string
     */
    public $token = null;

    /**
     * @var bool
     */
    public $tokenizationSucceeded = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->isNewToken)) {
            $object->isNewToken = $this->isNewToken;
        }
        if (!is_null($this->token)) {
            $object->token = $this->token;
        }
        if (!is_null($this->tokenizationSucceeded)) {
            $object->tokenizationSucceeded = $this->tokenizationSucceeded;
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
        if (property_exists($object, 'isNewToken')) {
            $this->isNewToken = $object->isNewToken;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        if (property_exists($object, 'tokenizationSucceeded')) {
            $this->tokenizationSucceeded = $object->tokenizationSucceeded;
        }
        return $this;
    }
}
