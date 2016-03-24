<?php
namespace GCS\Fei\Definitions;

use GCS\DataObject;

/**
 * Class AbstractPaymentMethodSpecificInput
 *
 * @package GCS\Fei\Definitions
 */
class AbstractPaymentMethodSpecificInput extends DataObject
{
    /**
     * @var int
     */
    public $paymentProductId = null;

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
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
