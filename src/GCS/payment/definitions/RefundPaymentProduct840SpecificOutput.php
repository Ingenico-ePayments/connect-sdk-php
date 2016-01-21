<?php
class GCS_payment_definitions_RefundPaymentProduct840SpecificOutput extends GCS_DataObject
{
    /**
     * @var GCS_payment_definitions_RefundPaymentProduct840CustomerAccount
     */
    public $customerAccount = null;

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
            $value = new GCS_payment_definitions_RefundPaymentProduct840CustomerAccount();
            $this->customerAccount = $value->fromObject($object->customerAccount);
        }
        return $this;
    }
}
