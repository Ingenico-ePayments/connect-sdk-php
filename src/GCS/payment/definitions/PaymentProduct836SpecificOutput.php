<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class PaymentProduct836SpecificOutput
 *
 * @package GCS\payment\definitions
 */
class PaymentProduct836SpecificOutput extends DataObject
{
    /**
     * @var string
     */
    public $securityIndicator = null;

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
        if (property_exists($object, 'securityIndicator')) {
            $this->securityIndicator = $object->securityIndicator;
        }
        return $this;
    }
}
