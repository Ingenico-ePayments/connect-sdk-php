<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\PersonalNameBase;

/**
 * Class PersonalName
 *
 * @package GCS\payment\definitions
 */
class PersonalName extends PersonalNameBase
{
    /**
     * @var string
     */
    public $title = null;

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
        if (property_exists($object, 'title')) {
            $this->title = $object->title;
        }
        return $this;
    }
}
