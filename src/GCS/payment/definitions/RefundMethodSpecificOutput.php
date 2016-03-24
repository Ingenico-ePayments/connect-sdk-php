<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class RefundMethodSpecificOutput
 *
 * @package GCS\payment\definitions
 */
class RefundMethodSpecificOutput extends DataObject
{
    /**
     * @var int
     */
    public $totalAmountPaid = null;

    /**
     * @var int
     */
    public $totalAmountRefunded = null;

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
        if (property_exists($object, 'totalAmountPaid')) {
            $this->totalAmountPaid = $object->totalAmountPaid;
        }
        if (property_exists($object, 'totalAmountRefunded')) {
            $this->totalAmountRefunded = $object->totalAmountRefunded;
        }
        return $this;
    }
}
