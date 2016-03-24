<?php
namespace GCS\Fei\Definitions;

use GCS\DataObject;

/**
 * Class FraudResults
 *
 * @package GCS\Fei\Definitions
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
