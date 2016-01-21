<?php
class GCS_payment_definitions_RefundMethodSpecificOutput extends GCS_DataObject
{
    /**
     * @var int
     */
    public $totalAmountPaid = null;

    /**
     * @var int
     */
    public $totalAmountRefunded = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'totalAmountPaid')) {
            $this->totalAmountPaid = $object->totalAmountPaid;
        }
        if (property_exists($object, 'totalAmountRefunded')) {
            $this->totalAmountRefunded = $object->totalAmountRefunded;
        }
        return $this;
    }
}
