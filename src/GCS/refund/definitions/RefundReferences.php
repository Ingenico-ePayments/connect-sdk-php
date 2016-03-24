<?php
namespace GCS\refund\definitions;

use GCS\DataObject;

/**
 * Class RefundReferences
 *
 * @package GCS\refund\definitions
 */
class RefundReferences extends DataObject
{
    /**
     * @var string
     */
    public $merchantReference = null;

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
        if (property_exists($object, 'merchantReference')) {
            $this->merchantReference = $object->merchantReference;
        }
        return $this;
    }
}
