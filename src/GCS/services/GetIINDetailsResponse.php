<?php
/**
 * class GetIINDetailsResponse
 */
class GCS_services_GetIINDetailsResponse extends GCS_DataObject
{
    /**
     * @var GCS_services_definitions_IINDetail[]
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
                $coBrandsElement = new GCS_services_definitions_IINDetail();
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
