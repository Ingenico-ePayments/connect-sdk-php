<?php
/**
 * class PaymentProductGroups
 */
class GCS_product_PaymentProductGroups extends GCS_DataObject
{
    /**
     * @var GCS_product_definitions_PaymentProductGroup[]
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
                $paymentProductGroupsElement = new GCS_product_definitions_PaymentProductGroup();
                $this->paymentProductGroups[] = $paymentProductGroupsElement->fromObject($paymentProductGroupsElementObject);
            }
        }
        return $this;
    }
}
