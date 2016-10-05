<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\CardWithoutCvv;
use UnexpectedValueException;

/**
 * Class Card
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Card Card
 */
class Card extends CardWithoutCvv
{
    /**
     * @var string
     */
    public $cvv = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'cvv')) {
            $this->cvv = $object->cvv;
        }
        return $this;
    }
}
