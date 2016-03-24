<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class AbstractPaymentMethodSpecificOutput
 *
 * @package GCS\payment\definitions
 */
class AbstractPaymentMethodSpecificOutput extends DataObject
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
