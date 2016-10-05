<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductGroup;
use UnexpectedValueException;

/**
 * Class PaymentProductGroups
 *
 * @package Ingenico\Connect\Sdk\Domain\Product
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProductGroups PaymentProductGroups
 */
class PaymentProductGroups extends DataObject
{
    /**
     * @var PaymentProductGroup[]
     */
    public $paymentProductGroups = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'paymentProductGroups')) {
            if (!is_array($object->paymentProductGroups) && !is_object($object->paymentProductGroups)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProductGroups, true) . '\' is not an array or object');
            }
            $this->paymentProductGroups = [];
            foreach ($object->paymentProductGroups as $paymentProductGroupsElementObject) {
                $paymentProductGroupsElement = new PaymentProductGroup();
                $this->paymentProductGroups[] = $paymentProductGroupsElement->fromObject($paymentProductGroupsElementObject);
            }
        }
        return $this;
    }
}
