<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class FraugsterResults extends DataObject
{
    /**
     * @var string
     */
    public $fraudInvestigationPoints = null;

    /**
     * @var int
     */
    public $fraudScore = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'fraudInvestigationPoints')) {
            $this->fraudInvestigationPoints = $object->fraudInvestigationPoints;
        }
        if (property_exists($object, 'fraudScore')) {
            $this->fraudScore = $object->fraudScore;
        }
        return $this;
    }
}
