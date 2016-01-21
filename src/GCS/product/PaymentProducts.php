<?php
/**
 * class PaymentProducts
 */
class GCS_product_PaymentProducts extends GCS_DataObject
{
    /**
     * @var GCS_product_definitions_PaymentProduct[]
     */
    public $paymentProducts = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'paymentProducts')) {
            if (!is_array($object->paymentProducts) && !is_object($object->paymentProducts)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProducts, true) . '\' is not an array or object');
            }
            $this->paymentProducts = [];
            foreach ($object->paymentProducts as $paymentProductsElementObject) {
                $paymentProductsElement = new GCS_product_definitions_PaymentProduct();
                $this->paymentProducts[] = $paymentProductsElement->fromObject($paymentProductsElementObject);
            }
        }
        return $this;
    }
}
