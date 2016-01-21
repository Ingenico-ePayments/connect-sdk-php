<?php
class GCS_fei_definitions_BankAccount extends GCS_DataObject
{
    /**
     * @var string
     */
    public $accountHolderName = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'accountHolderName')) {
            $this->accountHolderName = $object->accountHolderName;
        }
        return $this;
    }
}
