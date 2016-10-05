<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\LabelTemplateElement;
use UnexpectedValueException;

/**
 * Class AccountOnFileDisplayHints
 *
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_AccountOnFileDisplayHints AccountOnFileDisplayHints
 */
class AccountOnFileDisplayHints extends DataObject
{
    /**
     * @var LabelTemplateElement[]
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
                $labelTemplateElement = new LabelTemplateElement();
                $this->labelTemplate[] = $labelTemplateElement->fromObject($labelTemplateElementObject);
            }
        }
        if (property_exists($object, 'logo')) {
            $this->logo = $object->logo;
        }
        return $this;
    }
}
