<?php
namespace GCS\Fei\Definitions;

use GCS\DataObject;

/**
 * Class CardEssentials
 *
 * @package GCS\Fei\Definitions
 */
class CardEssentials extends DataObject
{
    /**
     * @var string
     */
    public $cardNumber = null;

    /**
     * @var string
     */
    public $expiryDate = null;

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
        if (property_exists($object, 'cardNumber')) {
            $this->cardNumber = $object->cardNumber;
        }
        if (property_exists($object, 'expiryDate')) {
            $this->expiryDate = $object->expiryDate;
        }
        return $this;
    }
}
