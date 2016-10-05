<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class PaymentProduct836SpecificOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProduct836SpecificOutput PaymentProduct836SpecificOutput
 */
class PaymentProduct836SpecificOutput extends DataObject
{
    /**
     * @var string
     */
    public $securityIndicator = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'securityIndicator')) {
            $this->securityIndicator = $object->securityIndicator;
        }
        return $this;
    }
}
