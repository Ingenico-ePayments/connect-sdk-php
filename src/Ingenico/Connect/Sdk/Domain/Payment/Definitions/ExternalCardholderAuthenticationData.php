<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ExternalCardholderAuthenticationData
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ExternalCardholderAuthenticationData ExternalCardholderAuthenticationData
 */
class ExternalCardholderAuthenticationData extends DataObject
{
    /**
     * @var string
     */
    public $cavv = null;

    /**
     * @var string
     */
    public $cavvAlgorithm = null;

    /**
     * @var int
     */
    public $eci = null;

    /**
     * @var string
     */
    public $validationResult = null;

    /**
     * @var string
     */
    public $xid = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'cavv')) {
            $this->cavv = $object->cavv;
        }
        if (property_exists($object, 'cavvAlgorithm')) {
            $this->cavvAlgorithm = $object->cavvAlgorithm;
        }
        if (property_exists($object, 'eci')) {
            $this->eci = $object->eci;
        }
        if (property_exists($object, 'validationResult')) {
            $this->validationResult = $object->validationResult;
        }
        if (property_exists($object, 'xid')) {
            $this->xid = $object->xid;
        }
        return $this;
    }
}
