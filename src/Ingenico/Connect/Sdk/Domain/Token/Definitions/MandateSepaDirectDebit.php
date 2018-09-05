<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class MandateSepaDirectDebit extends MandateSepaDirectDebitWithMandateId
{
    /**
     * @var Creditor
     */
    public $creditor = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'creditor')) {
            if (!is_object($object->creditor)) {
                throw new UnexpectedValueException('value \'' . print_r($object->creditor, true) . '\' is not an object');
            }
            $value = new Creditor();
            $this->creditor = $value->fromObject($object->creditor);
        }
        return $this;
    }
}
