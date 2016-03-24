<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class CashPaymentProduct1504SpecificInput
 *
 * @package GCS\Payment\Definitions
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
