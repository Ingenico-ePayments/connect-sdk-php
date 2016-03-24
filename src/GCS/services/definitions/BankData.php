<?php
namespace GCS\services\definitions;

use GCS\DataObject;

/**
 * Class BankData
 *
 * @package GCS\services\definitions
 */
class BankData extends DataObject
{
    /**
     * @var string
     */
    public $newBankName = null;

    /**
     * @var string
     */
    public $reformattedAccountNumber = null;

    /**
     * @var string
     */
    public $reformattedBankCode = null;

    /**
     * @var string
     */
    public $reformattedBranchCode = null;

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
        if (property_exists($object, 'newBankName')) {
            $this->newBankName = $object->newBankName;
        }
        if (property_exists($object, 'reformattedAccountNumber')) {
            $this->reformattedAccountNumber = $object->reformattedAccountNumber;
        }
        if (property_exists($object, 'reformattedBankCode')) {
            $this->reformattedBankCode = $object->reformattedBankCode;
        }
        if (property_exists($object, 'reformattedBranchCode')) {
            $this->reformattedBranchCode = $object->reformattedBranchCode;
        }
        return $this;
    }
}
