<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\AccountOnFile;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductDisplayHints;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductField;
use UnexpectedValueException;

/**
 * Class PaymentProductGroup
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProductGroup PaymentProductGroup
 */
class PaymentProductGroup extends DataObject
{
    /**
     * @var AccountOnFile[]
     */
    public $accountsOnFile = null;

    /**
     * @var PaymentProductDisplayHints
     */
    public $displayHints = null;

    /**
     * @var PaymentProductField[]
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
                $accountsOnFileElement = new AccountOnFile();
                $this->accountsOnFile[] = $accountsOnFileElement->fromObject($accountsOnFileElementObject);
            }
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayHints, true) . '\' is not an object');
            }
            $value = new PaymentProductDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'fields')) {
            if (!is_array($object->fields) && !is_object($object->fields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fields, true) . '\' is not an array or object');
            }
            $this->fields = [];
            foreach ($object->fields as $fieldsElementObject) {
                $fieldsElement = new PaymentProductField();
                $this->fields[] = $fieldsElement->fromObject($fieldsElementObject);
            }
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        return $this;
    }
}
