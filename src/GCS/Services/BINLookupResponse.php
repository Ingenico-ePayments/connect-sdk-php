<?php
namespace GCS\Services;

use GCS\DataObject;

/**
 * Class BINLookupResponse
 *
 * @package GCS\Services
 */
class BINLookupResponse extends DataObject
{
    /**
     * @var string
     */
    public $countryCode = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

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
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
