<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Capture;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Capture\Definitions\Capture;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Capture
 */
class CapturesResponse extends DataObject
{
    /**
     * @var Capture[]
     */
    public $captures = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'captures')) {
            if (!is_array($object->captures) && !is_object($object->captures)) {
                throw new UnexpectedValueException('value \'' . print_r($object->captures, true) . '\' is not an array or object');
            }
            $this->captures = [];
            foreach ($object->captures as $capturesElementObject) {
                $capturesElement = new Capture();
                $this->captures[] = $capturesElement->fromObject($capturesElementObject);
            }
        }
        return $this;
    }
}
