<?php
class GCS_fei_definitions_AmountOfMoney extends GCS_DataObject
{
    /**
     * @var int
     */
    public $amount = null;

    /**
     * @var string
     */
    public $currencyCode = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        if (property_exists($object, 'currencyCode')) {
            $this->currencyCode = $object->currencyCode;
        }
        return $this;
    }
}
