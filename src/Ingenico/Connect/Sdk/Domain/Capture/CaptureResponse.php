<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Capture;

use Ingenico\Connect\Sdk\Domain\Capture\Definitions\Capture;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Capture
 */
class CaptureResponse extends Capture
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