<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\BankAccountIban;

/**
 * Class RedirectPaymentProduct816SpecificInput
 *
 * @package GCS\Payment\Definitions
 */
class RedirectPaymentProduct816SpecificInput extends DataObject
{
    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountIban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        return $this;
    }
}
