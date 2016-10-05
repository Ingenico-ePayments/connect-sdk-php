<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\Domain\Token\Definitions\Creditor;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\MandateSepaDirectDebitWithMandateId;
use UnexpectedValueException;

/**
 * Class MandateSepaDirectDebit
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_MandateSepaDirectDebit MandateSepaDirectDebit
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
