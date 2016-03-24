<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class LineItemInvoiceData
 *
 * @package GCS\Payment\Definitions
 */
class LineItemInvoiceData extends DataObject
{
    /**
     * @var string
     */
    public $description = null;

    /**
     * @var string
     */
    public $merchantLinenumber = null;

    /**
     * @var string
     */
    public $merchantPagenumber = null;

    /**
     * @var string
     */
    public $nrOfItems = null;

    /**
     * @var int
     */
    public $pricePerItem = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'description')) {
            $this->description = $object->description;
        }
        if (property_exists($object, 'merchantLinenumber')) {
            $this->merchantLinenumber = $object->merchantLinenumber;
        }
        if (property_exists($object, 'merchantPagenumber')) {
            $this->merchantPagenumber = $object->merchantPagenumber;
        }
        if (property_exists($object, 'nrOfItems')) {
            $this->nrOfItems = $object->nrOfItems;
        }
        if (property_exists($object, 'pricePerItem')) {
            $this->pricePerItem = $object->pricePerItem;
        }
        return $this;
    }
}
