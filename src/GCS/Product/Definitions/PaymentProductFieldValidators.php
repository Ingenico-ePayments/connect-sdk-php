<?php
namespace GCS\Product\Definitions;

use GCS\DataObject;

/**
 * Class PaymentProductFieldValidators
 *
 * @package GCS\Product\Definitions
 */
class PaymentProductFieldValidators extends DataObject
{
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
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'emailAddress')) {
            if (!is_object($object->emailAddress)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->emailAddress, true) . '\' is not an object'
                );
            }
            $value = new EmptyValidator();
            $this->emailAddress = $value->fromObject($object->emailAddress);
        }
        if (property_exists($object, 'expirationDate')) {
            if (!is_object($object->expirationDate)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->expirationDate, true) . '\' is not an object'
                );
            }
            $value = new EmptyValidator();
            $this->expirationDate = $value->fromObject($object->expirationDate);
        }
        if (property_exists($object, 'fixedList')) {
            if (!is_object($object->fixedList)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->fixedList, true) . '\' is not an object'
                );
            }
            $value = new FixedListValidator();
            $this->fixedList = $value->fromObject($object->fixedList);
        }
        if (property_exists($object, 'length')) {
            if (!is_object($object->length)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->length, true) . '\' is not an object'
                );
            }
            $value = new LengthValidator();
            $this->length = $value->fromObject($object->length);
        }
        if (property_exists($object, 'luhn')) {
            if (!is_object($object->luhn)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->luhn, true) . '\' is not an object'
                );
            }
            $value = new EmptyValidator();
            $this->luhn = $value->fromObject($object->luhn);
        }
        if (property_exists($object, 'range')) {
            if (!is_object($object->range)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->range, true) . '\' is not an object'
                );
            }
            $value = new RangeValidator();
            $this->range = $value->fromObject($object->range);
        }
        if (property_exists($object, 'regularExpression')) {
            if (!is_object($object->regularExpression)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->regularExpression, true) . '\' is not an object'
                );
            }
            $value = new RegularExpressionValidator();
            $this->regularExpression = $value->fromObject($object->regularExpression);
        }
        return $this;
    }
}
