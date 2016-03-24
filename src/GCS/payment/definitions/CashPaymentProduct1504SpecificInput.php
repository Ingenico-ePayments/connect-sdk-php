<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class CashPaymentProduct1504SpecificInput
 *
 * @package GCS\payment\definitions
 */
class CashPaymentProduct1504SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $returnUrl = null;

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
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        return $this;
    }
}
