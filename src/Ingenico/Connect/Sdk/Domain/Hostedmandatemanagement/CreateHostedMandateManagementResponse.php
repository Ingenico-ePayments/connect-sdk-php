<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement
 */
class CreateHostedMandateManagementResponse extends DataObject
{
    /**
     * @var string
     */
    public $RETURNMAC = null;

    /**
     * @var string
     */
    public $hostedMandateManagementId = null;

    /**
     * @var string
     */
    public $partialRedirectUrl = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->RETURNMAC)) {
            $object->RETURNMAC = $this->RETURNMAC;
        }
        if (!is_null($this->hostedMandateManagementId)) {
            $object->hostedMandateManagementId = $this->hostedMandateManagementId;
        }
        if (!is_null($this->partialRedirectUrl)) {
            $object->partialRedirectUrl = $this->partialRedirectUrl;
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
        if (property_exists($object, 'RETURNMAC')) {
            $this->RETURNMAC = $object->RETURNMAC;
        }
        if (property_exists($object, 'hostedMandateManagementId')) {
            $this->hostedMandateManagementId = $object->hostedMandateManagementId;
        }
        if (property_exists($object, 'partialRedirectUrl')) {
            $this->partialRedirectUrl = $object->partialRedirectUrl;
        }
        return $this;
    }
}
