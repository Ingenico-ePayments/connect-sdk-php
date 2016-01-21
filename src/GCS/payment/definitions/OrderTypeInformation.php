<?php
class GCS_payment_definitions_OrderTypeInformation extends GCS_DataObject
{
    /**
     * @var string
     */
    public $purchaseType = null;

    /**
     * @var string
     */
    public $usageType = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'purchaseType')) {
            $this->purchaseType = $object->purchaseType;
        }
        if (property_exists($object, 'usageType')) {
            $this->usageType = $object->usageType;
        }
        return $this;
    }
}
