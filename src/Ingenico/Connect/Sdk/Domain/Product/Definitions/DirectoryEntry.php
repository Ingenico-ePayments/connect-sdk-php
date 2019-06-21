<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 */
class DirectoryEntry extends DataObject
{
    /**
     * @var string[]
     */
    public $countryNames = null;

    /**
     * @var string
     */
    public $issuerId = null;

    /**
     * @var string
     */
    public $issuerList = null;

    /**
     * @var string
     */
    public $issuerName = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->countryNames)) {
            $object->countryNames = [];
            foreach ($this->countryNames as $element) {
                if (!is_null($element)) {
                    $object->countryNames[] = $element;
                }
            }
        }
        if (!is_null($this->issuerId)) {
            $object->issuerId = $this->issuerId;
        }
        if (!is_null($this->issuerList)) {
            $object->issuerList = $this->issuerList;
        }
        if (!is_null($this->issuerName)) {
            $object->issuerName = $this->issuerName;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'countryNames')) {
            if (!is_array($object->countryNames) && !is_object($object->countryNames)) {
                throw new UnexpectedValueException('value \'' . print_r($object->countryNames, true) . '\' is not an array or object');
            }
            $this->countryNames = [];
            foreach ($object->countryNames as $element) {
                $this->countryNames[] = $element;
            }
        }
        if (property_exists($object, 'issuerId')) {
            $this->issuerId = $object->issuerId;
        }
        if (property_exists($object, 'issuerList')) {
            $this->issuerList = $object->issuerList;
        }
        if (property_exists($object, 'issuerName')) {
            $this->issuerName = $object->issuerName;
        }
        return $this;
    }
}
