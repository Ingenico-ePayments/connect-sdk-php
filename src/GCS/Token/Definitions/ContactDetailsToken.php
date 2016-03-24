<?php
namespace GCS\Token\Definitions;

use GCS\Fei\Definitions\ContactDetailsBase;

/**
 * Class ContactDetailsToken
 *
 * @package GCS\Token\Definitions
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
