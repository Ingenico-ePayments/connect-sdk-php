<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Services;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Services\Definitions\IINDetail;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Services
 */
class GetIINDetailsResponse extends DataObject
{
    /**
     * @var IINDetail[]
     */
    public $coBrands = null;

    /**
     * @var string
     */
    public $countryCode = null;

    /**
     * @var bool
     */
    public $isAllowedInContext = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->coBrands)) {
            $object->coBrands = [];
            foreach ($this->coBrands as $element) {
                if (!is_null($element)) {
                    $object->coBrands[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->countryCode)) {
            $object->countryCode = $this->countryCode;
        }
        if (!is_null($this->isAllowedInContext)) {
            $object->isAllowedInContext = $this->isAllowedInContext;
        }
        if (!is_null($this->paymentProductId)) {
            $object->paymentProductId = $this->paymentProductId;
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
        if (property_exists($object, 'coBrands')) {
            if (!is_array($object->coBrands) && !is_object($object->coBrands)) {
                throw new UnexpectedValueException('value \'' . print_r($object->coBrands, true) . '\' is not an array or object');
            }
            $this->coBrands = [];
            foreach ($object->coBrands as $element) {
                $value = new IINDetail();
                $this->coBrands[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
        }
        if (property_exists($object, 'isAllowedInContext')) {
            $this->isAllowedInContext = $object->isAllowedInContext;
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
