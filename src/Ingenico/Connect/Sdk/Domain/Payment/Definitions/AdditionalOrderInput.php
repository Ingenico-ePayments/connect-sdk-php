<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AirlineData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Level3SummaryData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderTypeInformation;
use UnexpectedValueException;

/**
 * Class AdditionalOrderInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_AdditionalOrderInput AdditionalOrderInput
 */
class AdditionalOrderInput extends DataObject
{
    /**
     * @var AirlineData
     */
    public $airlineData = null;

    /**
     * @var Level3SummaryData
     * @deprecated Use Order.shoppingCart instead
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
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'airlineData')) {
            if (!is_object($object->airlineData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->airlineData, true) . '\' is not an object');
            }
            $value = new AirlineData();
            $this->airlineData = $value->fromObject($object->airlineData);
        }
        if (property_exists($object, 'level3SummaryData')) {
            if (!is_object($object->level3SummaryData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->level3SummaryData, true) . '\' is not an object');
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
                throw new UnexpectedValueException('value \'' . print_r($object->typeInformation, true) . '\' is not an object');
            }
            $value = new OrderTypeInformation();
            $this->typeInformation = $value->fromObject($object->typeInformation);
        }
        return $this;
    }
}
