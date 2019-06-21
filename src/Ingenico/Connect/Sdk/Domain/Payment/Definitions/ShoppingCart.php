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
class ShoppingCart extends DataObject
{
    /**
     * @var AmountBreakdown[]
     */
    public $amountBreakdown = null;

    /**
     * @var GiftCardPurchase
     */
    public $giftCardPurchase = null;

    /**
     * @var bool
     */
    public $isPreOrder = null;

    /**
     * @var LineItem[]
     */
    public $items = null;

    /**
     * @var string
     */
    public $preOrderItemAvailabilityDate = null;

    /**
     * @var bool
     */
    public $reOrderIndicator = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amountBreakdown)) {
            $object->amountBreakdown = [];
            foreach ($this->amountBreakdown as $element) {
                if (!is_null($element)) {
                    $object->amountBreakdown[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->giftCardPurchase)) {
            $object->giftCardPurchase = $this->giftCardPurchase->toObject();
        }
        if (!is_null($this->isPreOrder)) {
            $object->isPreOrder = $this->isPreOrder;
        }
        if (!is_null($this->items)) {
            $object->items = [];
            foreach ($this->items as $element) {
                if (!is_null($element)) {
                    $object->items[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->preOrderItemAvailabilityDate)) {
            $object->preOrderItemAvailabilityDate = $this->preOrderItemAvailabilityDate;
        }
        if (!is_null($this->reOrderIndicator)) {
            $object->reOrderIndicator = $this->reOrderIndicator;
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
        if (property_exists($object, 'amountBreakdown')) {
            if (!is_array($object->amountBreakdown) && !is_object($object->amountBreakdown)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountBreakdown, true) . '\' is not an array or object');
            }
            $this->amountBreakdown = [];
            foreach ($object->amountBreakdown as $element) {
                $value = new AmountBreakdown();
                $this->amountBreakdown[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'giftCardPurchase')) {
            if (!is_object($object->giftCardPurchase)) {
                throw new UnexpectedValueException('value \'' . print_r($object->giftCardPurchase, true) . '\' is not an object');
            }
            $value = new GiftCardPurchase();
            $this->giftCardPurchase = $value->fromObject($object->giftCardPurchase);
        }
        if (property_exists($object, 'isPreOrder')) {
            $this->isPreOrder = $object->isPreOrder;
        }
        if (property_exists($object, 'items')) {
            if (!is_array($object->items) && !is_object($object->items)) {
                throw new UnexpectedValueException('value \'' . print_r($object->items, true) . '\' is not an array or object');
            }
            $this->items = [];
            foreach ($object->items as $element) {
                $value = new LineItem();
                $this->items[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'preOrderItemAvailabilityDate')) {
            $this->preOrderItemAvailabilityDate = $object->preOrderItemAvailabilityDate;
        }
        if (property_exists($object, 'reOrderIndicator')) {
            $this->reOrderIndicator = $object->reOrderIndicator;
        }
        return $this;
    }
}
