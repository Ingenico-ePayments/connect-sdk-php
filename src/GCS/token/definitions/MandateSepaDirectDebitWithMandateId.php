<?php
namespace GCS\token\definitions;

/**
 * Class MandateSepaDirectDebitWithMandateId
 *
 * @package GCS\token\definitions
 */
class MandateSepaDirectDebitWithMandateId extends MandateSepaDirectDebitWithoutCreditor
{
    /**
     * @var string
     */
    public $mandateId = null;

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
        if (property_exists($object, 'mandateId')) {
            $this->mandateId = $object->mandateId;
        }
        return $this;
    }
}
