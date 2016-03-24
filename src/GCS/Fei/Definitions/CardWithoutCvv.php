<?php
namespace GCS\Fei\Definitions;

/**
 * Class CardWithoutCvv
 *
 * @package GCS\Fei\Definitions
 */
class CardWithoutCvv extends CardEssentials
{
    /**
     * @var string
     */
    public $cardholderName = null;

    /**
     * @var string
     */
    public $issueNumber = null;

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
        if (property_exists($object, 'cardholderName')) {
            $this->cardholderName = $object->cardholderName;
        }
        if (property_exists($object, 'issueNumber')) {
            $this->issueNumber = $object->issueNumber;
        }
        return $this;
    }
}
