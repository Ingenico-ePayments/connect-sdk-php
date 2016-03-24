<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\Address;

/**
 * Class PaymentProduct840SpecificOutput
 *
 * @package GCS\Payment\Definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'customerAccount')) {
            if (!is_object($object->customerAccount)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->customerAccount, true) . '\' is not an object'
                );
            }
            $value = new PaymentProduct840CustomerAccount();
            $this->customerAccount = $value->fromObject($object->customerAccount);
        }
        if (property_exists($object, 'customerAddress')) {
            if (!is_object($object->customerAddress)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->customerAddress, true) . '\' is not an object'
                );
            }
            $value = new Address();
            $this->customerAddress = $value->fromObject($object->customerAddress);
        }
        return $this;
    }
}
