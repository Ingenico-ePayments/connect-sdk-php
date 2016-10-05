<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\CardEssentials;
use UnexpectedValueException;

/**
 * Class CardWithoutCvv
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CardWithoutCvv CardWithoutCvv
 */
class CardWithoutCvv extends CardEssentials
{
    /**
     * @var string
     */
    public $cardholderName = null;

    /**
     * @var string
     */
    public $issueNumber = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'cardholderName')) {
            $this->cardholderName = $object->cardholderName;
        }
        if (property_exists($object, 'issueNumber')) {
            $this->issueNumber = $object->issueNumber;
        }
        return $this;
    }
}
