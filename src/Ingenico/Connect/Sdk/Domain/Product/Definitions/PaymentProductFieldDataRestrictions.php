<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductFieldValidators;
use UnexpectedValueException;

/**
 * Class PaymentProductFieldDataRestrictions
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProductFieldDataRestrictions PaymentProductFieldDataRestrictions
 */
class PaymentProductFieldDataRestrictions extends DataObject
{
    /**
     * @var bool
     */
    public $isRequired = null;

    /**
     * @var PaymentProductFieldValidators
     */
    public $validators = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'isRequired')) {
            $this->isRequired = $object->isRequired;
        }
        if (property_exists($object, 'validators')) {
            if (!is_object($object->validators)) {
                throw new UnexpectedValueException('value \'' . print_r($object->validators, true) . '\' is not an object');
            }
            $value = new PaymentProductFieldValidators();
            $this->validators = $value->fromObject($object->validators);
        }
        return $this;
    }
}
