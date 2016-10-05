<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PaymentCreationReferences;
use UnexpectedValueException;

/**
 * Class PaymentCreationOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentCreationOutput PaymentCreationOutput
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
        return $this;
    }
}
