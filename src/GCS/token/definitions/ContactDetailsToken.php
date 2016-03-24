<?php
namespace GCS\token\definitions;

use GCS\fei\definitions\ContactDetailsBase;

/**
 * Class ContactDetailsToken
 *
 * @package GCS\token\definitions
 */
class ContactDetailsToken extends ContactDetailsBase
{
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
        return $this;
    }
}
