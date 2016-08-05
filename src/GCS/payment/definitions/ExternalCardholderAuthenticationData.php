<?php
class GCS_payment_definitions_ExternalCardholderAuthenticationData extends GCS_DataObject
{
    /**
     * @var string
     */
    public $cavv = null;

    /**
     * @var string
     */
    public $cavvAlgorithm = null;

    /**
     * @var int
     */
    public $eci = null;

    /**
     * @var string
     */
    public $validationResult = null;

    /**
     * @var string
     */
    public $xid = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'cavv')) {
            $this->cavv = $object->cavv;
        }
        if (property_exists($object, 'cavvAlgorithm')) {
            $this->cavvAlgorithm = $object->cavvAlgorithm;
        }
        if (property_exists($object, 'eci')) {
            $this->eci = $object->eci;
        }
        if (property_exists($object, 'validationResult')) {
            $this->validationResult = $object->validationResult;
        }
        if (property_exists($object, 'xid')) {
            $this->xid = $object->xid;
        }
        return $this;
    }
}
