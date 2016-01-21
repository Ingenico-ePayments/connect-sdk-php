<?php
class GCS_payment_definitions_PersonalName extends GCS_fei_definitions_PersonalNameBase
{
    /**
     * @var string
     */
    public $title = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
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
