<?php
class GCS_refund_definitions_BankAccountBbanRefund extends GCS_fei_definitions_BankAccountBban
{
    /**
     * @var string
     */
    public $bankCity = null;

    /**
     * @var string
     */
    public $swiftCode = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bankCity')) {
            $this->bankCity = $object->bankCity;
        }
        if (property_exists($object, 'swiftCode')) {
            $this->swiftCode = $object->swiftCode;
        }
        return $this;
    }
}
