<?php
class GCS_payment_definitions_RedirectPaymentProduct809SpecificInput extends GCS_DataObject
{
    /**
     * @var string
     */
    public $expirationPeriod = null;

    /**
     * @var string
     */
    public $issuerId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'expirationPeriod')) {
            $this->expirationPeriod = $object->expirationPeriod;
        }
        if (property_exists($object, 'issuerId')) {
            $this->issuerId = $object->issuerId;
        }
        return $this;
    }
}
