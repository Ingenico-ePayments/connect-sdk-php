<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class RetailDecisionsCCFraudCheckOutput
 *
 * @package GCS\fei\definitions
 */
class RetailDecisionsCCFraudCheckOutput extends DataObject
{
    /**
     * @var string
     */
    public $fraudCode = null;

    /**
     * @var string
     */
    public $fraudNeural = null;

    /**
     * @var string
     */
    public $fraudRCF = null;

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
        if (property_exists($object, 'fraudCode')) {
            $this->fraudCode = $object->fraudCode;
        }
        if (property_exists($object, 'fraudNeural')) {
            $this->fraudNeural = $object->fraudNeural;
        }
        if (property_exists($object, 'fraudRCF')) {
            $this->fraudRCF = $object->fraudRCF;
        }
        return $this;
    }
}
