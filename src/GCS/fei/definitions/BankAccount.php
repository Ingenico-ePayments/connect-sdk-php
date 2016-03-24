<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class BankAccount
 *
 * @package GCS\fei\definitions
 */
class BankAccount extends DataObject
{
    /**
     * @var string
     */
    public $accountHolderName = null;

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
        if (property_exists($object, 'accountHolderName')) {
            $this->accountHolderName = $object->accountHolderName;
        }
        return $this;
    }
}
