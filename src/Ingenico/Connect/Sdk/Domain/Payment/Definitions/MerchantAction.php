<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\KeyValuePair;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectData;
use UnexpectedValueException;

/**
 * Class MerchantAction
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_MerchantAction MerchantAction
 */
class MerchantAction extends DataObject
{
    /**
     * @var string
     */
    public $actionType = null;

    /**
     * @var RedirectData
     */
    public $redirectData = null;

    /**
     * @var string
     */
    public $renderingData = null;

    /**
     * @var KeyValuePair[]
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
            $value = new RedirectData();
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
                $showDataElement = new KeyValuePair();
                $this->showData[] = $showDataElement->fromObject($showDataElementObject);
            }
        }
        return $this;
    }
}
