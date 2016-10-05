<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\FraudResults;
use Ingenico\Connect\Sdk\Domain\Definitions\FraudResultsRetailDecisions;
use UnexpectedValueException;

/**
 * Class CardFraudResults
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CardFraudResults CardFraudResults
 */
class CardFraudResults extends FraudResults
{
    /**
     * @var string
     */
    public $avsResult = null;

    /**
     * @var string
     */
    public $cvvResult = null;

    /**
     * @var FraudResultsRetailDecisions
     */
    public $retailDecisions = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'avsResult')) {
            $this->avsResult = $object->avsResult;
        }
        if (property_exists($object, 'cvvResult')) {
            $this->cvvResult = $object->cvvResult;
        }
        if (property_exists($object, 'retailDecisions')) {
            if (!is_object($object->retailDecisions)) {
                throw new UnexpectedValueException('value \'' . print_r($object->retailDecisions, true) . '\' is not an object');
            }
            $value = new FraudResultsRetailDecisions();
            $this->retailDecisions = $value->fromObject($object->retailDecisions);
        }
        return $this;
    }
}
