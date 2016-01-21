<?php
class GCS_hostedcheckout_definitions_DisplayedData extends GCS_DataObject
{
    /**
     * @var string
     */
    public $displayedDataType = null;

    /**
     * @var string
     */
    public $renderingData = null;

    /**
     * @var GCS_fei_definitions_KeyValuePair[]
     */
    public $showData = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'displayedDataType')) {
            $this->displayedDataType = $object->displayedDataType;
        }
        if (property_exists($object, 'renderingData')) {
            $this->renderingData = $object->renderingData;
        }
        if (property_exists($object, 'showData')) {
            if (!is_array($object->showData) && !is_object($object->showData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->showData, true) . '\' is not an array or object');
            }
            $this->showData = [];
            foreach ($object->showData as $showDataElementObject) {
                $showDataElement = new GCS_fei_definitions_KeyValuePair();
                $this->showData[] = $showDataElement->fromObject($showDataElementObject);
            }
        }
        return $this;
    }
}
