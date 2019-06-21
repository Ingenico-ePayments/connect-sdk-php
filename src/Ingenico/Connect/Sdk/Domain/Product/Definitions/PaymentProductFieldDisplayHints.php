<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 */
class PaymentProductFieldDisplayHints extends DataObject
{
    /**
     * @var bool
     */
    public $alwaysShow = null;

    /**
     * @var int
     */
    public $displayOrder = null;

    /**
     * @var PaymentProductFieldFormElement
     */
    public $formElement = null;

    /**
     * @var string
     */
    public $label = null;

    /**
     * @var string
     */
    public $link = null;

    /**
     * @var string
     */
    public $mask = null;

    /**
     * @var bool
     */
    public $obfuscate = null;

    /**
     * @var string
     */
    public $placeholderLabel = null;

    /**
     * @var string
     */
    public $preferredInputType = null;

    /**
     * @var PaymentProductFieldTooltip
     */
    public $tooltip = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->alwaysShow)) {
            $object->alwaysShow = $this->alwaysShow;
        }
        if (!is_null($this->displayOrder)) {
            $object->displayOrder = $this->displayOrder;
        }
        if (!is_null($this->formElement)) {
            $object->formElement = $this->formElement->toObject();
        }
        if (!is_null($this->label)) {
            $object->label = $this->label;
        }
        if (!is_null($this->link)) {
            $object->link = $this->link;
        }
        if (!is_null($this->mask)) {
            $object->mask = $this->mask;
        }
        if (!is_null($this->obfuscate)) {
            $object->obfuscate = $this->obfuscate;
        }
        if (!is_null($this->placeholderLabel)) {
            $object->placeholderLabel = $this->placeholderLabel;
        }
        if (!is_null($this->preferredInputType)) {
            $object->preferredInputType = $this->preferredInputType;
        }
        if (!is_null($this->tooltip)) {
            $object->tooltip = $this->tooltip->toObject();
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
        if (property_exists($object, 'alwaysShow')) {
            $this->alwaysShow = $object->alwaysShow;
        }
        if (property_exists($object, 'displayOrder')) {
            $this->displayOrder = $object->displayOrder;
        }
        if (property_exists($object, 'formElement')) {
            if (!is_object($object->formElement)) {
                throw new UnexpectedValueException('value \'' . print_r($object->formElement, true) . '\' is not an object');
            }
            $value = new PaymentProductFieldFormElement();
            $this->formElement = $value->fromObject($object->formElement);
        }
        if (property_exists($object, 'label')) {
            $this->label = $object->label;
        }
        if (property_exists($object, 'link')) {
            $this->link = $object->link;
        }
        if (property_exists($object, 'mask')) {
            $this->mask = $object->mask;
        }
        if (property_exists($object, 'obfuscate')) {
            $this->obfuscate = $object->obfuscate;
        }
        if (property_exists($object, 'placeholderLabel')) {
            $this->placeholderLabel = $object->placeholderLabel;
        }
        if (property_exists($object, 'preferredInputType')) {
            $this->preferredInputType = $object->preferredInputType;
        }
        if (property_exists($object, 'tooltip')) {
            if (!is_object($object->tooltip)) {
                throw new UnexpectedValueException('value \'' . print_r($object->tooltip, true) . '\' is not an object');
            }
            $value = new PaymentProductFieldTooltip();
            $this->tooltip = $value->fromObject($object->tooltip);
        }
        return $this;
    }
}
