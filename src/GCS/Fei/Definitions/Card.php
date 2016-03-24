<?php
namespace GCS\Fei\Definitions;

/**
 * Class Card
 *
 * @package GCS\Fei\Definitions
 */
class Card extends CardWithoutCvv
{
    /**
     * @var string
     */
    public $cvv = null;

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
        if (property_exists($object, 'cvv')) {
            $this->cvv = $object->cvv;
        }
        return $this;
    }
}
