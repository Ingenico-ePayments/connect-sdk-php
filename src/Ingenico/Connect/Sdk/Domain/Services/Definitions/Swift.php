<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Services\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class Swift
 *
 * @package Ingenico\Connect\Sdk\Domain\Services\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Swift Swift
 */
class Swift extends DataObject
{
    /**
     * @var string
     */
    public $bic = null;

    /**
     * @var string
     */
    public $category = null;

    /**
     * @var string
     */
    public $chipsUID = null;

    /**
     * @var string
     */
    public $extraInfo = null;

    /**
     * @var string
     */
    public $poBoxCountry = null;

    /**
     * @var string
     */
    public $poBoxLocation = null;

    /**
     * @var string
     */
    public $poBoxNumber = null;

    /**
     * @var string
     */
    public $poBoxZip = null;

    /**
     * @var string
     */
    public $routingBic = null;

    /**
     * @var string
     */
    public $services = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bic')) {
            $this->bic = $object->bic;
        }
        if (property_exists($object, 'category')) {
            $this->category = $object->category;
        }
        if (property_exists($object, 'chipsUID')) {
            $this->chipsUID = $object->chipsUID;
        }
        if (property_exists($object, 'extraInfo')) {
            $this->extraInfo = $object->extraInfo;
        }
        if (property_exists($object, 'poBoxCountry')) {
            $this->poBoxCountry = $object->poBoxCountry;
        }
        if (property_exists($object, 'poBoxLocation')) {
            $this->poBoxLocation = $object->poBoxLocation;
        }
        if (property_exists($object, 'poBoxNumber')) {
            $this->poBoxNumber = $object->poBoxNumber;
        }
        if (property_exists($object, 'poBoxZip')) {
            $this->poBoxZip = $object->poBoxZip;
        }
        if (property_exists($object, 'routingBic')) {
            $this->routingBic = $object->routingBic;
        }
        if (property_exists($object, 'services')) {
            $this->services = $object->services;
        }
        return $this;
    }
}
