<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\PersonalNameBase;
use UnexpectedValueException;

/**
 * Class PersonalName
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PersonalName PersonalName
 */
class PersonalName extends PersonalNameBase
{
    /**
     * @var string
     */
    public $title = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'title')) {
            $this->title = $object->title;
        }
        return $this;
    }
}
