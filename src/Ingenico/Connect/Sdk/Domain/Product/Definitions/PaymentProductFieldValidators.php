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
class PaymentProductFieldValidators extends DataObject
{
    /**
     * @var BoletoBancarioRequirednessValidator
     */
    public $boletoBancarioRequiredness = null;

    /**
     * @var EmptyValidator
     */
    public $emailAddress = null;

    /**
     * @var EmptyValidator
     */
    public $expirationDate = null;

    /**
     * @var FixedListValidator
     */
    public $fixedList = null;

    /**
     * @var EmptyValidator
     */
    public $iban = null;

    /**
     * @var LengthValidator
     */
    public $length = null;

    /**
     * @var EmptyValidator
     */
    public $luhn = null;

    /**
     * @var RangeValidator
     */
    public $range = null;

    /**
     * @var RegularExpressionValidator
     */
    public $regularExpression = null;

    /**
     * @var EmptyValidator
     */
    public $residentIdNumber = null;

    /**
     * @var EmptyValidator
     */
    public $termsAndConditions = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->boletoBancarioRequiredness)) {
            $object->boletoBancarioRequiredness = $this->boletoBancarioRequiredness->toObject();
        }
        if (!is_null($this->emailAddress)) {
            $object->emailAddress = $this->emailAddress->toObject();
        }
        if (!is_null($this->expirationDate)) {
            $object->expirationDate = $this->expirationDate->toObject();
        }
        if (!is_null($this->fixedList)) {
            $object->fixedList = $this->fixedList->toObject();
        }
        if (!is_null($this->iban)) {
            $object->iban = $this->iban->toObject();
        }
        if (!is_null($this->length)) {
            $object->length = $this->length->toObject();
        }
        if (!is_null($this->luhn)) {
            $object->luhn = $this->luhn->toObject();
        }
        if (!is_null($this->range)) {
            $object->range = $this->range->toObject();
        }
        if (!is_null($this->regularExpression)) {
            $object->regularExpression = $this->regularExpression->toObject();
        }
        if (!is_null($this->residentIdNumber)) {
            $object->residentIdNumber = $this->residentIdNumber->toObject();
        }
        if (!is_null($this->termsAndConditions)) {
            $object->termsAndConditions = $this->termsAndConditions->toObject();
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
        if (property_exists($object, 'boletoBancarioRequiredness')) {
            if (!is_object($object->boletoBancarioRequiredness)) {
                throw new UnexpectedValueException('value \'' . print_r($object->boletoBancarioRequiredness, true) . '\' is not an object');
            }
            $value = new BoletoBancarioRequirednessValidator();
            $this->boletoBancarioRequiredness = $value->fromObject($object->boletoBancarioRequiredness);
        }
        if (property_exists($object, 'emailAddress')) {
            if (!is_object($object->emailAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->emailAddress, true) . '\' is not an object');
            }
            $value = new EmptyValidator();
            $this->emailAddress = $value->fromObject($object->emailAddress);
        }
        if (property_exists($object, 'expirationDate')) {
            if (!is_object($object->expirationDate)) {
                throw new UnexpectedValueException('value \'' . print_r($object->expirationDate, true) . '\' is not an object');
            }
            $value = new EmptyValidator();
            $this->expirationDate = $value->fromObject($object->expirationDate);
        }
        if (property_exists($object, 'fixedList')) {
            if (!is_object($object->fixedList)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fixedList, true) . '\' is not an object');
            }
            $value = new FixedListValidator();
            $this->fixedList = $value->fromObject($object->fixedList);
        }
        if (property_exists($object, 'iban')) {
            if (!is_object($object->iban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->iban, true) . '\' is not an object');
            }
            $value = new EmptyValidator();
            $this->iban = $value->fromObject($object->iban);
        }
        if (property_exists($object, 'length')) {
            if (!is_object($object->length)) {
                throw new UnexpectedValueException('value \'' . print_r($object->length, true) . '\' is not an object');
            }
            $value = new LengthValidator();
            $this->length = $value->fromObject($object->length);
        }
        if (property_exists($object, 'luhn')) {
            if (!is_object($object->luhn)) {
                throw new UnexpectedValueException('value \'' . print_r($object->luhn, true) . '\' is not an object');
            }
            $value = new EmptyValidator();
            $this->luhn = $value->fromObject($object->luhn);
        }
        if (property_exists($object, 'range')) {
            if (!is_object($object->range)) {
                throw new UnexpectedValueException('value \'' . print_r($object->range, true) . '\' is not an object');
            }
            $value = new RangeValidator();
            $this->range = $value->fromObject($object->range);
        }
        if (property_exists($object, 'regularExpression')) {
            if (!is_object($object->regularExpression)) {
                throw new UnexpectedValueException('value \'' . print_r($object->regularExpression, true) . '\' is not an object');
            }
            $value = new RegularExpressionValidator();
            $this->regularExpression = $value->fromObject($object->regularExpression);
        }
        if (property_exists($object, 'residentIdNumber')) {
            if (!is_object($object->residentIdNumber)) {
                throw new UnexpectedValueException('value \'' . print_r($object->residentIdNumber, true) . '\' is not an object');
            }
            $value = new EmptyValidator();
            $this->residentIdNumber = $value->fromObject($object->residentIdNumber);
        }
        if (property_exists($object, 'termsAndConditions')) {
            if (!is_object($object->termsAndConditions)) {
                throw new UnexpectedValueException('value \'' . print_r($object->termsAndConditions, true) . '\' is not an object');
            }
            $value = new EmptyValidator();
            $this->termsAndConditions = $value->fromObject($object->termsAndConditions);
        }
        return $this;
    }
}
