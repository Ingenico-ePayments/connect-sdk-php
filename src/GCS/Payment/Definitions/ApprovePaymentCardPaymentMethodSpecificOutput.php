<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class ApprovePaymentCardPaymentMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
 */
class ApprovePaymentCardPaymentMethodSpecificOutput extends DataObject
{
    /**
     * @var string
     */
    public $voidResponseId = null;

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
        if (property_exists($object, 'voidResponseId')) {
            $this->voidResponseId = $object->voidResponseId;
        }
        return $this;
    }
}
