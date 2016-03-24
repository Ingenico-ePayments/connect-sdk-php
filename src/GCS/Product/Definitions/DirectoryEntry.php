<?php
namespace GCS\Product\Definitions;

use GCS\DataObject;

/**
 * Class DirectoryEntry
 *
 * @package GCS\Product\Definitions
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
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'countryNames')) {
            if (!is_array($object->countryNames) && !is_object($object->countryNames)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->countryNames, true) . '\' is not an array or object'
                );
            }
            $this->countryNames = [];
            foreach ($object->countryNames as $countryNamesElementObject) {
                $this->countryNames[] = $countryNamesElementObject;
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
