<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\Domain\Token\Definitions\MandateSepaDirectDebitWithoutCreditor;
use UnexpectedValueException;

/**
 * Class MandateSepaDirectDebitWithMandateId
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_MandateSepaDirectDebitWithMandateId MandateSepaDirectDebitWithMandateId
 */
class MandateSepaDirectDebitWithMandateId extends MandateSepaDirectDebitWithoutCreditor
{
    /**
     * @var string
     */
    public $mandateId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'mandateId')) {
            $this->mandateId = $object->mandateId;
        }
        return $this;
    }
}
