<?php
namespace GCS\Fei\Definitions;

use GCS\DataObject;

/**
 * Class BankAccount
 *
 * @package GCS\Fei\Definitions
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
