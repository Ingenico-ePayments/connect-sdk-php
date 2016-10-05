<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\ValidationBankAccountCheck;
use UnexpectedValueException;

/**
 * Class ValidationBankAccountOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ValidationBankAccountOutput ValidationBankAccountOutput
 */
class ValidationBankAccountOutput extends DataObject
{
    /**
     * @var ValidationBankAccountCheck[]
     */
    public $checks = null;

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
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'checks')) {
            if (!is_array($object->checks) && !is_object($object->checks)) {
                throw new UnexpectedValueException('value \'' . print_r($object->checks, true) . '\' is not an array or object');
            }
            $this->checks = [];
            foreach ($object->checks as $checksElementObject) {
                $checksElement = new ValidationBankAccountCheck();
                $this->checks[] = $checksElement->fromObject($checksElementObject);
            }
        }
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
