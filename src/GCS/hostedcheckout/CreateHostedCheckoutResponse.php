<?php
namespace GCS\hostedcheckout;

use GCS\DataObject;

/**
 * Class CreateHostedCheckoutResponse
 *
 * @package GCS\hostedcheckout
 */
class CreateHostedCheckoutResponse extends DataObject
{
    /**
     * @var string
     */
    public $RETURNMAC = null;

    /**
     * @var string
     */
    public $hostedCheckoutId = null;

    /**
     * @var string
     */
    public $partialRedirectUrl = null;

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
        if (property_exists($object, 'RETURNMAC')) {
            $this->RETURNMAC = $object->RETURNMAC;
        }
        if (property_exists($object, 'hostedCheckoutId')) {
            $this->hostedCheckoutId = $object->hostedCheckoutId;
        }
        if (property_exists($object, 'partialRedirectUrl')) {
            $this->partialRedirectUrl = $object->partialRedirectUrl;
        }
        return $this;
    }
}
