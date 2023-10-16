<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Installments;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Installments\Definitions\InstallmentOptions;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Installments
 */
class InstallmentOptionsResponse extends DataObject
{
    /**
     * @var InstallmentOptions[]
     */
    public $installmentOptions = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->installmentOptions)) {
            $object->installmentOptions = [];
            foreach ($this->installmentOptions as $element) {
                if (!is_null($element)) {
                    $object->installmentOptions[] = $element->toObject();
                }
            }
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
        if (property_exists($object, 'installmentOptions')) {
            if (!is_array($object->installmentOptions) && !is_object($object->installmentOptions)) {
                throw new UnexpectedValueException('value \'' . print_r($object->installmentOptions, true) . '\' is not an array or object');
            }
            $this->installmentOptions = [];
            foreach ($object->installmentOptions as $element) {
                $value = new InstallmentOptions();
                $this->installmentOptions[] = $value->fromObject($element);
            }
        }
        return $this;
    }
}
