<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;

/**
 * Class ThreeDSecureResults
 *
 * @package GCS\Payment\Definitions
 */
class ThreeDSecureResults extends DataObject
{
    /**
     * @var string
     */
    public $cavv = null;

    /**
     * @var string
     */
    public $eci = null;

    /**
     * @var string
     */
    public $xid = null;

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
        if (property_exists($object, 'cavv')) {
            $this->cavv = $object->cavv;
        }
        if (property_exists($object, 'eci')) {
            $this->eci = $object->eci;
        }
        if (property_exists($object, 'xid')) {
            $this->xid = $object->xid;
        }
        return $this;
    }
}
