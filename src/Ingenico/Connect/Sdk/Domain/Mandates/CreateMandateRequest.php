<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Mandates;

use Ingenico\Connect\Sdk\Domain\Mandates\Definitions\CreateMandateWithReturnUrl;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Mandates
 */
class CreateMandateRequest extends CreateMandateWithReturnUrl
{
    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
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
        return $this;
    }
}
