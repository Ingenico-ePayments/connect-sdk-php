<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class RedirectPaymentProduct809SpecificInput
 *
 * @package GCS\payment\definitions
 */
class RedirectPaymentProduct809SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $expirationPeriod = null;

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
        if (property_exists($object, 'expirationPeriod')) {
            $this->expirationPeriod = $object->expirationPeriod;
        }
        if (property_exists($object, 'issuerId')) {
            $this->issuerId = $object->issuerId;
        }
        return $this;
    }
}
