<?php
namespace GCS\payment;

use GCS\DataObject;

/**
 * Class TokenizePaymentRequest
 *
 * @package GCS\payment
 */
class TokenizePaymentRequest extends DataObject
{
    /**
     * @var string
     */
    public $alias = null;

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
        if (property_exists($object, 'alias')) {
            $this->alias = $object->alias;
        }
        return $this;
    }
}
