<?php
namespace GCS\token\definitions;

use GCS\DataObject;

/**
 * Class MandateApproval
 *
 * @package GCS\token\definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
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
