<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->description)) {
            $object->description = $this->description;
        }
        if (!is_null($this->merchantLinenumber)) {
            $object->merchantLinenumber = $this->merchantLinenumber;
        }
        if (!is_null($this->merchantPagenumber)) {
            $object->merchantPagenumber = $this->merchantPagenumber;
        }
        if (!is_null($this->nrOfItems)) {
            $object->nrOfItems = $this->nrOfItems;
        }
        if (!is_null($this->pricePerItem)) {
            $object->pricePerItem = $this->pricePerItem;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
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
