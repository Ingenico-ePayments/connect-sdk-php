<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Sessions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Sessions
 */
class SessionResponse extends DataObject
{
    /**
     * @var string
     */
    public $assetUrl = null;

    /**
     * @var string
     */
    public $clientApiUrl = null;

    /**
     * @var string
     */
    public $clientSessionId = null;

    /**
     * @var string
     */
    public $customerId = null;

    /**
     * @var string[]
     */
    public $invalidTokens = null;

    /**
     * @var string
     */
    public $region = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->assetUrl)) {
            $object->assetUrl = $this->assetUrl;
        }
        if (!is_null($this->clientApiUrl)) {
            $object->clientApiUrl = $this->clientApiUrl;
        }
        if (!is_null($this->clientSessionId)) {
            $object->clientSessionId = $this->clientSessionId;
        }
        if (!is_null($this->customerId)) {
            $object->customerId = $this->customerId;
        }
        if (!is_null($this->invalidTokens)) {
            $object->invalidTokens = [];
            foreach ($this->invalidTokens as $element) {
                if (!is_null($element)) {
                    $object->invalidTokens[] = $element;
                }
            }
        }
        if (!is_null($this->region)) {
            $object->region = $this->region;
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
        if (property_exists($object, 'assetUrl')) {
            $this->assetUrl = $object->assetUrl;
        }
        if (property_exists($object, 'clientApiUrl')) {
            $this->clientApiUrl = $object->clientApiUrl;
        }
        if (property_exists($object, 'clientSessionId')) {
            $this->clientSessionId = $object->clientSessionId;
        }
        if (property_exists($object, 'customerId')) {
            $this->customerId = $object->customerId;
        }
        if (property_exists($object, 'invalidTokens')) {
            if (!is_array($object->invalidTokens) && !is_object($object->invalidTokens)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invalidTokens, true) . '\' is not an array or object');
            }
            $this->invalidTokens = [];
            foreach ($object->invalidTokens as $element) {
                $this->invalidTokens[] = $element;
            }
        }
        if (property_exists($object, 'region')) {
            $this->region = $object->region;
        }
        return $this;
    }
}
