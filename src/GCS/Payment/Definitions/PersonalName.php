<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\PersonalNameBase;

/**
 * Class PersonalName
 *
 * @package GCS\Payment\Definitions
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
