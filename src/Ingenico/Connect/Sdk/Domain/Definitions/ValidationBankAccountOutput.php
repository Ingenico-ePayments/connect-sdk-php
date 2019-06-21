<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->checks)) {
            $object->checks = [];
            foreach ($this->checks as $element) {
                if (!is_null($element)) {
                    $object->checks[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->newBankName)) {
            $object->newBankName = $this->newBankName;
        }
        if (!is_null($this->reformattedAccountNumber)) {
            $object->reformattedAccountNumber = $this->reformattedAccountNumber;
        }
        if (!is_null($this->reformattedBankCode)) {
            $object->reformattedBankCode = $this->reformattedBankCode;
        }
        if (!is_null($this->reformattedBranchCode)) {
            $object->reformattedBranchCode = $this->reformattedBranchCode;
        }
        return $object;
    }

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
            foreach ($object->checks as $element) {
                $value = new ValidationBankAccountCheck();
                $this->checks[] = $value->fromObject($element);
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
