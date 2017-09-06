<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class RedirectPaymentProduct840SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $custom = null;

    /**
     * @var bool
     */
    public $isShortcut = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'custom')) {
            $this->custom = $object->custom;
        }
        if (property_exists($object, 'isShortcut')) {
            $this->isShortcut = $object->isShortcut;
        }
        return $this;
    }
}
