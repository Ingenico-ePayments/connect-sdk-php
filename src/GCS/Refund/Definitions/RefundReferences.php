<?php
namespace GCS\Refund\Definitions;

use GCS\DataObject;

/**
 * Class RefundReferences
 *
 * @package GCS\Refund\Definitions
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
