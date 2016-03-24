<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class RefundPaymentProduct840SpecificOutput
 *
 * @package GCS\Payment\Definitions
 */
class RefundPaymentProduct840SpecificOutput extends DataObject
{
    /**
     * @var RefundPaymentProduct840CustomerAccount
     */
    public $customerAccount = null;

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
            $value = new RefundPaymentProduct840CustomerAccount();
            $this->customerAccount = $value->fromObject($object->customerAccount);
        }
        return $this;
    }
}
