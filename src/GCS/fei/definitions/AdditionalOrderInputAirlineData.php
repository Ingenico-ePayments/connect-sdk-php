<?php
class GCS_fei_definitions_AdditionalOrderInputAirlineData extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_AirlineData
     */
    public $airlineData = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'airlineData')) {
            if (!is_object($object->airlineData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->airlineData, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_AirlineData();
            $this->airlineData = $value->fromObject($object->airlineData);
        }
        return $this;
    }
}
