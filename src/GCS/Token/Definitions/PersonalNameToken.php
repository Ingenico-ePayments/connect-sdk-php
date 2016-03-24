<?php
namespace GCS\Token\Definitions;

use GCS\Fei\Definitions\PersonalNameBase;

/**
 * Class PersonalNameToken
 *
 * @package GCS\Token\Definitions
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
