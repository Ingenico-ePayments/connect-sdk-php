<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class RedirectData
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RedirectData RedirectData
 */
class RedirectData extends DataObject
{
    /**
     * @var string
     */
    public $RETURNMAC = null;

    /**
     * @var string
     */
    public $redirectURL = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'RETURNMAC')) {
            $this->RETURNMAC = $object->RETURNMAC;
        }
        if (property_exists($object, 'redirectURL')) {
            $this->redirectURL = $object->redirectURL;
        }
        return $this;
    }
}
