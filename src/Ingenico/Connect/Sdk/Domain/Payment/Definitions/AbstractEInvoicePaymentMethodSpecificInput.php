<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractPaymentMethodSpecificInput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class AbstractEInvoicePaymentMethodSpecificInput extends AbstractPaymentMethodSpecificInput
{
    /**
     * @var bool
     */
    public $requiresApproval = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->requiresApproval)) {
            $object->requiresApproval = $this->requiresApproval;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'requiresApproval')) {
            $this->requiresApproval = $object->requiresApproval;
        }
        return $this;
    }
}
