<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Token;

use Ingenico\Connect\Sdk\Domain\Token\Definitions\MandateApproval;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token
 */
class ApproveTokenRequest extends MandateApproval
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
