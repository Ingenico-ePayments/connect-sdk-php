<?php
class GCS_payment_definitions_PaymentProduct840SpecificOutput extends GCS_DataObject
{
    /**
     * @var GCS_payment_definitions_PaymentProduct840CustomerAccount
     */
    public $customerAccount = null;

    /**
     * @var GCS_fei_definitions_Address
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
            $value = new GCS_payment_definitions_PaymentProduct840CustomerAccount();
            $this->customerAccount = $value->fromObject($object->customerAccount);
        }
        if (property_exists($object, 'customerAddress')) {
            if (!is_object($object->customerAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customerAddress, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_Address();
            $this->customerAddress = $value->fromObject($object->customerAddress);
        }
        return $this;
    }
}
