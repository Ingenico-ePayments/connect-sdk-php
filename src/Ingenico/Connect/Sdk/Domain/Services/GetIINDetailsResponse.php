<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Services;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Services\Definitions\IINDetail;
use UnexpectedValueException;

/**
 * Class GetIINDetailsResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Services
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_GetIINDetailsResponse GetIINDetailsResponse
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
            foreach ($object->coBrands as $coBrandsElementObject) {
                $coBrandsElement = new IINDetail();
                $this->coBrands[] = $coBrandsElement->fromObject($coBrandsElementObject);
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
