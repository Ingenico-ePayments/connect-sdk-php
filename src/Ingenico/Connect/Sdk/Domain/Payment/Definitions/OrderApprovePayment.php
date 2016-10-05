<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AdditionalOrderInputAirlineData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderReferencesApprovePayment;
use UnexpectedValueException;

/**
 * Class OrderApprovePayment
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_OrderApprovePayment OrderApprovePayment
 */
class OrderApprovePayment extends DataObject
{
    /**
     * @var AdditionalOrderInputAirlineData
     */
    public $additionalInput = null;

    /**
     * @var OrderReferencesApprovePayment
     */
    public $references = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->additionalInput, true) . '\' is not an object');
            }
            $value = new AdditionalOrderInputAirlineData();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new OrderReferencesApprovePayment();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
