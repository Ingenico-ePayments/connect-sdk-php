<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class FraudResults
 *
 * @package GCS\fei\definitions
 */
class FraudResults extends DataObject
{
    /**
     * @var string
     */
    public $fraudServiceResult = null;

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
        if (property_exists($object, 'fraudServiceResult')) {
            $this->fraudServiceResult = $object->fraudServiceResult;
        }
        return $this;
    }
}
