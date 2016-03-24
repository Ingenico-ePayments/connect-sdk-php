<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class OrderReferencesApprovePayment
 *
 * @package GCS\Payment\Definitions
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
