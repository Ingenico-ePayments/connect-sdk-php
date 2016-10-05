<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Sessions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class SessionResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Sessions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_SessionResponse SessionResponse
 */
class SessionResponse extends DataObject
{
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
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
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
            foreach ($object->invalidTokens as $invalidTokensElementObject) {
                $this->invalidTokens[] = $invalidTokensElementObject;
            }
        }
        if (property_exists($object, 'region')) {
            $this->region = $object->region;
        }
        return $this;
    }
}
