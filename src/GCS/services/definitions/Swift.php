<?php
namespace GCS\services\definitions;

use GCS\DataObject;

/**
 * Class Swift
 *
 * @package GCS\services\definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
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
