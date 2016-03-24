<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class AdditionalOrderInputAirlineData
 *
 * @package GCS\fei\definitions
 */
class AdditionalOrderInputAirlineData extends DataObject
{
    /**
     * @var AirlineData
     */
    public $airlineData = null;

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
        if (property_exists($object, 'airlineData')) {
            if (!is_object($object->airlineData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->airlineData, true) . '\' is not an object'
                );
            }
            $value = new AirlineData();
            $this->airlineData = $value->fromObject($object->airlineData);
        }
        return $this;
    }
}
