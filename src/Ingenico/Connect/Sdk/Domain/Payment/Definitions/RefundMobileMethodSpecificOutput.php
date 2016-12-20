<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RefundMethodSpecificOutput;
use UnexpectedValueException;

/**
 * Class RefundMobileMethodSpecificOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RefundMobileMethodSpecificOutput RefundMobileMethodSpecificOutput
 */
class RefundMobileMethodSpecificOutput extends RefundMethodSpecificOutput
{
    /**
     * @var string
     */
    public $network = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'network')) {
            $this->network = $object->network;
        }
        return $this;
    }
}
