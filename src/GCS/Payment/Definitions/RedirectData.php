<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class RedirectData
 *
 * @package GCS\Payment\Definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
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
