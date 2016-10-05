<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductFieldFormElement;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductFieldTooltip;
use UnexpectedValueException;

/**
 * Class PaymentProductFieldDisplayHints
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProductFieldDisplayHints PaymentProductFieldDisplayHints
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
