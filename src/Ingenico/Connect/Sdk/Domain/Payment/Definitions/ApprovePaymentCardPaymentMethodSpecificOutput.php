<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ApprovePaymentCardPaymentMethodSpecificOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ApprovePaymentCardPaymentMethodSpecificOutput ApprovePaymentCardPaymentMethodSpecificOutput
 */
class ApprovePaymentCardPaymentMethodSpecificOutput extends DataObject
{
    /**
     * @var string
     */
    public $voidResponseId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'voidResponseId')) {
            $this->voidResponseId = $object->voidResponseId;
        }
        return $this;
    }
}
