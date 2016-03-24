<?php
namespace GCS\payment\definitions;

use GCS\DataObject;
use GCS\fei\definitions\AmountOfMoney;

/**
 * Class OrderOutput
 *
 * @package GCS\payment\definitions
 */
class OrderOutput extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var PaymentReferences
     */
    public $references = null;

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
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->amountOfMoney, true) . '\' is not an object'
                );
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->references, true) . '\' is not an object'
                );
            }
            $value = new PaymentReferences();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
