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
class OrderLineDetails extends DataObject
{
    /**
     * @var int
     */
    public $discountAmount = null;

    /**
     * @var int
     */
    public $googleProductCategoryId = null;

    /**
     * @var int
     */
    public $lineAmountTotal = null;

    /**
     * @var string
     */
    public $productCategory = null;

    /**
     * @var string
     */
    public $productCode = null;

    /**
     * @var string
     */
    public $productName = null;

    /**
     * @var int
     */
    public $productPrice = null;

    /**
     * @var string
     */
    public $productType = null;

    /**
     * @var int
     */
    public $quantity = null;

    /**
     * @var int
     */
    public $taxAmount = null;

    /**
     * @var string
     */
    public $unit = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->discountAmount)) {
            $object->discountAmount = $this->discountAmount;
        }
        if (!is_null($this->googleProductCategoryId)) {
            $object->googleProductCategoryId = $this->googleProductCategoryId;
        }
        if (!is_null($this->lineAmountTotal)) {
            $object->lineAmountTotal = $this->lineAmountTotal;
        }
        if (!is_null($this->productCategory)) {
            $object->productCategory = $this->productCategory;
        }
        if (!is_null($this->productCode)) {
            $object->productCode = $this->productCode;
        }
        if (!is_null($this->productName)) {
            $object->productName = $this->productName;
        }
        if (!is_null($this->productPrice)) {
            $object->productPrice = $this->productPrice;
        }
        if (!is_null($this->productType)) {
            $object->productType = $this->productType;
        }
        if (!is_null($this->quantity)) {
            $object->quantity = $this->quantity;
        }
        if (!is_null($this->taxAmount)) {
            $object->taxAmount = $this->taxAmount;
        }
        if (!is_null($this->unit)) {
            $object->unit = $this->unit;
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
        if (property_exists($object, 'discountAmount')) {
            $this->discountAmount = $object->discountAmount;
        }
        if (property_exists($object, 'googleProductCategoryId')) {
            $this->googleProductCategoryId = $object->googleProductCategoryId;
        }
        if (property_exists($object, 'lineAmountTotal')) {
            $this->lineAmountTotal = $object->lineAmountTotal;
        }
        if (property_exists($object, 'productCategory')) {
            $this->productCategory = $object->productCategory;
        }
        if (property_exists($object, 'productCode')) {
            $this->productCode = $object->productCode;
        }
        if (property_exists($object, 'productName')) {
            $this->productName = $object->productName;
        }
        if (property_exists($object, 'productPrice')) {
            $this->productPrice = $object->productPrice;
        }
        if (property_exists($object, 'productType')) {
            $this->productType = $object->productType;
        }
        if (property_exists($object, 'quantity')) {
            $this->quantity = $object->quantity;
        }
        if (property_exists($object, 'taxAmount')) {
            $this->taxAmount = $object->taxAmount;
        }
        if (property_exists($object, 'unit')) {
            $this->unit = $object->unit;
        }
        return $this;
    }
}
