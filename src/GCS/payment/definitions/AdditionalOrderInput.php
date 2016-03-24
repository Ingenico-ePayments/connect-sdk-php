<?php
namespace GCS\payment\definitions;

use GCS\DataObject;
use GCS\fei\definitions\AirlineData;

/**
 * Class AdditionalOrderInput
 *
 * @package GCS\payment\definitions
 */
class AdditionalOrderInput extends DataObject
{
    /**
     * @var AirlineData
     */
    public $airlineData = null;

    /**
     * @var Level3SummaryData
     */
    public $level3SummaryData = null;

    /**
     * @var int
     */
    public $numberOfInstallments = null;

    /**
     * @var string
     */
    public $orderDate = null;

    /**
     * @var OrderTypeInformation
     */
    public $typeInformation = null;

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
        if (property_exists($object, 'airlineData')) {
            if (!is_object($object->airlineData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->airlineData, true) . '\' is not an object'
                );
            }
            $value = new AirlineData();
            $this->airlineData = $value->fromObject($object->airlineData);
        }
        if (property_exists($object, 'level3SummaryData')) {
            if (!is_object($object->level3SummaryData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->level3SummaryData, true) . '\' is not an object'
                );
            }
            $value = new Level3SummaryData();
            $this->level3SummaryData = $value->fromObject($object->level3SummaryData);
        }
        if (property_exists($object, 'numberOfInstallments')) {
            $this->numberOfInstallments = $object->numberOfInstallments;
        }
        if (property_exists($object, 'orderDate')) {
            $this->orderDate = $object->orderDate;
        }
        if (property_exists($object, 'typeInformation')) {
            if (!is_object($object->typeInformation)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->typeInformation, true) . '\' is not an object'
                );
            }
            $value = new OrderTypeInformation();
            $this->typeInformation = $value->fromObject($object->typeInformation);
        }
        return $this;
    }
}
