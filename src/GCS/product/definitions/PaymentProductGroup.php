<?php
class GCS_product_definitions_PaymentProductGroup extends GCS_DataObject
{
    /**
     * @var GCS_product_definitions_AccountOnFile[]
     */
    public $accountsOnFile = null;

    /**
     * @var GCS_product_definitions_PaymentProductDisplayHints
     */
    public $displayHints = null;

    /**
     * @var GCS_product_definitions_PaymentProductField[]
     */
    public $fields = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'accountsOnFile')) {
            if (!is_array($object->accountsOnFile) && !is_object($object->accountsOnFile)) {
                throw new UnexpectedValueException('value \'' . print_r($object->accountsOnFile, true) . '\' is not an array or object');
            }
            $this->accountsOnFile = [];
            foreach ($object->accountsOnFile as $accountsOnFileElementObject) {
                $accountsOnFileElement = new GCS_product_definitions_AccountOnFile();
                $this->accountsOnFile[] = $accountsOnFileElement->fromObject($accountsOnFileElementObject);
            }
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayHints, true) . '\' is not an object');
            }
            $value = new GCS_product_definitions_PaymentProductDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'fields')) {
            if (!is_array($object->fields) && !is_object($object->fields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fields, true) . '\' is not an array or object');
            }
            $this->fields = [];
            foreach ($object->fields as $fieldsElementObject) {
                $fieldsElement = new GCS_product_definitions_PaymentProductField();
                $this->fields[] = $fieldsElement->fromObject($fieldsElementObject);
            }
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        return $this;
    }
}
