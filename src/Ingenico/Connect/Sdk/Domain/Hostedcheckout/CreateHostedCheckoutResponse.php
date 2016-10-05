<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class CreateHostedCheckoutResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CreateHostedCheckoutResponse CreateHostedCheckoutResponse
 */
class CreateHostedCheckoutResponse extends DataObject
{
    /**
     * @var string
     */
    public $RETURNMAC = null;

    /**
     * @var string
     */
    public $hostedCheckoutId = null;

    /**
     * @var string[]
     */
    public $invalidTokens = null;

    /**
     * @var string
     */
    public $partialRedirectUrl = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'RETURNMAC')) {
            $this->RETURNMAC = $object->RETURNMAC;
        }
        if (property_exists($object, 'hostedCheckoutId')) {
            $this->hostedCheckoutId = $object->hostedCheckoutId;
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
        if (property_exists($object, 'partialRedirectUrl')) {
            $this->partialRedirectUrl = $object->partialRedirectUrl;
        }
        return $this;
    }
}
