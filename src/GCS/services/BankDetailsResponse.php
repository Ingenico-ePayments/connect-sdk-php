<?php
/**
 * class BankDetailsResponse
 */
class GCS_services_BankDetailsResponse extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_BankAccountBban
     */
    public $bankAccountBban = null;

    /**
     * @var GCS_fei_definitions_BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var GCS_services_definitions_BankData
     */
    public $bankData = null;

    /**
     * @var GCS_services_definitions_Swift
     */
    public $swift = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountBban, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'bankData')) {
            if (!is_object($object->bankData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankData, true) . '\' is not an object');
            }
            $value = new GCS_services_definitions_BankData();
            $this->bankData = $value->fromObject($object->bankData);
        }
        if (property_exists($object, 'swift')) {
            if (!is_object($object->swift)) {
                throw new UnexpectedValueException('value \'' . print_r($object->swift, true) . '\' is not an object');
            }
            $value = new GCS_services_definitions_Swift();
            $this->swift = $value->fromObject($object->swift);
        }
        return $this;
    }
}
