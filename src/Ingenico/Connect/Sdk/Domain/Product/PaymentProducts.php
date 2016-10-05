<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProduct;
use UnexpectedValueException;

/**
 * Class PaymentProducts
 *
 * @package Ingenico\Connect\Sdk\Domain\Product
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProducts PaymentProducts
 */
class PaymentProducts extends DataObject
{
    /**
     * @var PaymentProduct[]
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
                $paymentProductsElement = new PaymentProduct();
                $this->paymentProducts[] = $paymentProductsElement->fromObject($paymentProductsElementObject);
            }
        }
        return $this;
    }
}
