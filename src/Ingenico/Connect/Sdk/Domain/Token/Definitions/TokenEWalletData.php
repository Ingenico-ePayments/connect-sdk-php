<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class TokenEWalletData extends DataObject
{
    /**
     * @var string
     */
    public $billingAgreementId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->billingAgreementId)) {
            $object->billingAgreementId = $this->billingAgreementId;
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
        if (property_exists($object, 'billingAgreementId')) {
            $this->billingAgreementId = $object->billingAgreementId;
        }
        return $this;
    }
}
