<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class RedirectPaymentProduct882SpecificInput
 *
 * @package GCS\payment\definitions
 */
class RedirectPaymentProduct882SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $issuerId = null;

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
        if (property_exists($object, 'issuerId')) {
            $this->issuerId = $object->issuerId;
        }
        return $this;
    }
}
