<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class OrderReferencesApprovePayment
 *
 * @package GCS\payment\definitions
 */
class OrderReferencesApprovePayment extends DataObject
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
