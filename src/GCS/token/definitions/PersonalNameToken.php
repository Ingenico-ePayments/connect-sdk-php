<?php
namespace GCS\token\definitions;

use GCS\fei\definitions\PersonalNameBase;

/**
 * Class PersonalNameToken
 *
 * @package GCS\token\definitions
 */
class PersonalNameToken extends PersonalNameBase
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
