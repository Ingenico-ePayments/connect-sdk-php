<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class MandateApproval
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_MandateApproval MandateApproval
 */
class MandateApproval extends DataObject
{
    /**
     * @var string
     */
    public $mandateSignatureDate = null;

    /**
     * @var string
     */
    public $mandateSignaturePlace = null;

    /**
     * @var bool
     */
    public $mandateSigned = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'mandateSignatureDate')) {
            $this->mandateSignatureDate = $object->mandateSignatureDate;
        }
        if (property_exists($object, 'mandateSignaturePlace')) {
            $this->mandateSignaturePlace = $object->mandateSignaturePlace;
        }
        if (property_exists($object, 'mandateSigned')) {
            $this->mandateSigned = $object->mandateSigned;
        }
        return $this;
    }
}
