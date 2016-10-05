<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\ContactDetailsBase;
use UnexpectedValueException;

/**
 * Class ContactDetailsToken
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ContactDetailsToken ContactDetailsToken
 */
class ContactDetailsToken extends ContactDetailsBase
{
    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        return $this;
    }
}
