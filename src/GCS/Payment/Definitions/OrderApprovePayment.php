<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\AdditionalOrderInputAirlineData;

/**
 * Class OrderApprovePayment
 *
 * @package GCS\Payment\Definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->additionalInput, true) . '\' is not an object'
                );
            }
            $value = new AdditionalOrderInputAirlineData();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->references, true) . '\' is not an object'
                );
            }
            $value = new OrderReferencesApprovePayment();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
