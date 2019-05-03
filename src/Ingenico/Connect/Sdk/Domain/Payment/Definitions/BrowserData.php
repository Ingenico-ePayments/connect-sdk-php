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
class BrowserData extends DataObject
{
    /**
     * @var int
     */
    public $colorDepth = null;

    /**
     * @var string
     */
    public $innerHeight = null;

    /**
     * @var string
     */
    public $innerWidth = null;

    /**
     * @var bool
     */
    public $javaEnabled = null;

    /**
     * @var bool
     */
    public $javaScriptEnabled = null;

    /**
     * @var string
     */
    public $screenHeight = null;

    /**
     * @var string
     */
    public $screenWidth = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'colorDepth')) {
            $this->colorDepth = $object->colorDepth;
        }
        if (property_exists($object, 'innerHeight')) {
            $this->innerHeight = $object->innerHeight;
        }
        if (property_exists($object, 'innerWidth')) {
            $this->innerWidth = $object->innerWidth;
        }
        if (property_exists($object, 'javaEnabled')) {
            $this->javaEnabled = $object->javaEnabled;
        }
        if (property_exists($object, 'javaScriptEnabled')) {
            $this->javaScriptEnabled = $object->javaScriptEnabled;
        }
        if (property_exists($object, 'screenHeight')) {
            $this->screenHeight = $object->screenHeight;
        }
        if (property_exists($object, 'screenWidth')) {
            $this->screenWidth = $object->screenWidth;
        }
        return $this;
    }
}
