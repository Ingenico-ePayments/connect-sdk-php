<?php
namespace GCS\product\definitions;

use GCS\DataObject;

/**
 * Class PaymentProductField
 *
 * @package GCS\product\definitions
 */
class PaymentProductField extends DataObject
{
    /**
     * @var PaymentProductFieldDataRestrictions
     */
    public $dataRestrictions = null;

    /**
     * @var PaymentProductFieldDisplayHints
     */
    public $displayHints = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $type = null;

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
        if (property_exists($object, 'dataRestrictions')) {
            if (!is_object($object->dataRestrictions)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->dataRestrictions, true) . '\' is not an object'
                );
            }
            $value = new PaymentProductFieldDataRestrictions();
            $this->dataRestrictions = $value->fromObject($object->dataRestrictions);
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->displayHints, true) . '\' is not an object'
                );
            }
            $value = new PaymentProductFieldDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        return $this;
    }
}
