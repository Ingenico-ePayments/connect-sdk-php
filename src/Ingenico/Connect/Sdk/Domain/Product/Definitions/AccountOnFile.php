<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\AccountOnFileAttribute;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\AccountOnFileDisplayHints;
use UnexpectedValueException;

/**
 * Class AccountOnFile
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_AccountOnFile AccountOnFile
 */
class AccountOnFile extends DataObject
{
    /**
     * @var AccountOnFileAttribute[]
     */
    public $attributes = null;

    /**
     * @var AccountOnFileDisplayHints
     */
    public $displayHints = null;

    /**
     * @var int
     */
    public $id = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'attributes')) {
            if (!is_array($object->attributes) && !is_object($object->attributes)) {
                throw new UnexpectedValueException('value \'' . print_r($object->attributes, true) . '\' is not an array or object');
            }
            $this->attributes = [];
            foreach ($object->attributes as $attributesElementObject) {
                $attributesElement = new AccountOnFileAttribute();
                $this->attributes[] = $attributesElement->fromObject($attributesElementObject);
            }
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayHints, true) . '\' is not an object');
            }
            $value = new AccountOnFileDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
