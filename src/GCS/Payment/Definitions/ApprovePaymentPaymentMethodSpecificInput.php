<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class ApprovePaymentPaymentMethodSpecificInput
 *
 * @package GCS\Payment\Definitions
 */
class ApprovePaymentPaymentMethodSpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $dateCollect = null;

    /**
     * @var string
     */
    public $token = null;

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
        if (property_exists($object, 'dateCollect')) {
            $this->dateCollect = $object->dateCollect;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
