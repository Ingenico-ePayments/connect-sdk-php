<?php
class GCS_payment_definitions_PaymentStatusOutput extends GCS_fei_definitions_OrderStatusOutput
{
    /**
     * @var bool
     */
    public $isAuthorized = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'isAuthorized')) {
            $this->isAuthorized = $object->isAuthorized;
        }
        return $this;
    }
}
