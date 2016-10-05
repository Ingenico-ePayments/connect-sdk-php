<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PaymentProduct840CustomerAccount;
use UnexpectedValueException;

/**
 * Class PaymentProduct840SpecificOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProduct840SpecificOutput PaymentProduct840SpecificOutput
 */
class PaymentProduct840SpecificOutput extends DataObject
{
    /**
     * @var PaymentProduct840CustomerAccount
     */
    public $customerAccount = null;

    /**
     * @var Address
     */
    public $customerAddress = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'customerAccount')) {
            if (!is_object($object->customerAccount)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customerAccount, true) . '\' is not an object');
            }
            $value = new PaymentProduct840CustomerAccount();
            $this->customerAccount = $value->fromObject($object->customerAccount);
        }
        if (property_exists($object, 'customerAddress')) {
            if (!is_object($object->customerAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customerAddress, true) . '\' is not an object');
            }
            $value = new Address();
            $this->customerAddress = $value->fromObject($object->customerAddress);
        }
        return $this;
    }
}
