<?php
namespace GCS\token\definitions;

use GCS\DataObject;
use GCS\fei\definitions\BankAccountBban;

/**
 * Class TokenNonSepaDirectDebitPaymentProduct705SpecificData
 *
 * @package GCS\token\definitions
 */
class TokenNonSepaDirectDebitPaymentProduct705SpecificData extends DataObject
{
    /**
     * @var string
     */
    public $authorisationId = null;

    /**
     * @var BankAccountBban
     */
    public $bankAccountBban = null;

    /**
     * @param object $object
     * @return $this
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'authorisationId')) {
            $this->authorisationId = $object->authorisationId;
        }
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountBban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        return $this;
    }
}
