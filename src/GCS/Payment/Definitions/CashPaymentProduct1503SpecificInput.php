<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class CashPaymentProduct1503SpecificInput
 *
 * @package GCS\Payment\Definitions
 */
class CashPaymentProduct1503SpecificInput extends DataObject
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
