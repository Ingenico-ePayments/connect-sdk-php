<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class PaymentCreationReferences
 *
 * @package GCS\payment\definitions
 */
class PaymentCreationReferences extends DataObject
{
    /**
     * @var string
     */
    public $additionalReference = null;

    /**
     * @var string
     */
    public $externalReference = null;

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
        if (property_exists($object, 'additionalReference')) {
            $this->additionalReference = $object->additionalReference;
        }
        if (property_exists($object, 'externalReference')) {
            $this->externalReference = $object->externalReference;
        }
        return $this;
    }
}
