<?php
class GCS_payment_definitions_MerchantAction extends GCS_DataObject
{
    /**
     * @var string
     */
    public $actionType = null;

    /**
     * @var GCS_payment_definitions_RedirectData
     */
    public $redirectData = null;

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
        if (property_exists($object, 'actionType')) {
            $this->actionType = $object->actionType;
        }
        if (property_exists($object, 'redirectData')) {
            if (!is_object($object->redirectData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectData, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_RedirectData();
            $this->redirectData = $value->fromObject($object->redirectData);
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
