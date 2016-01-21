<?php
class GCS_product_definitions_AccountOnFileDisplayHints extends GCS_DataObject
{
    /**
     * @var GCS_product_definitions_LabelTemplateElement[]
     */
    public $labelTemplate = null;

    /**
     * @var string
     */
    public $logo = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'labelTemplate')) {
            if (!is_array($object->labelTemplate) && !is_object($object->labelTemplate)) {
                throw new UnexpectedValueException('value \'' . print_r($object->labelTemplate, true) . '\' is not an array or object');
            }
            $this->labelTemplate = [];
            foreach ($object->labelTemplate as $labelTemplateElementObject) {
                $labelTemplateElement = new GCS_product_definitions_LabelTemplateElement();
                $this->labelTemplate[] = $labelTemplateElement->fromObject($labelTemplateElementObject);
            }
        }
        if (property_exists($object, 'logo')) {
            $this->logo = $object->logo;
        }
        return $this;
    }
}
