<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class AmountOfMoney
 *
 * @package GCS\fei\definitions
 */
class AmountOfMoney extends DataObject
{
    /**
     * @var int
     */
    public $amount = null;

    /**
     * @var string
     */
    public $currencyCode = null;

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
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        if (property_exists($object, 'currencyCode')) {
            $this->currencyCode = $object->currencyCode;
        }
        return $this;
    }
}
