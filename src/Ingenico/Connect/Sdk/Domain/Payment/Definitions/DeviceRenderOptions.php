<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class DeviceRenderOptions extends DataObject
{
    /**
     * @var string
     */
    public $sdkInterface = null;

    /**
     * @var string
     */
    public $sdkUiType = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->sdkInterface)) {
            $object->sdkInterface = $this->sdkInterface;
        }
        if (!is_null($this->sdkUiType)) {
            $object->sdkUiType = $this->sdkUiType;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'sdkInterface')) {
            $this->sdkInterface = $object->sdkInterface;
        }
        if (property_exists($object, 'sdkUiType')) {
            $this->sdkUiType = $object->sdkUiType;
        }
        return $this;
    }
}
