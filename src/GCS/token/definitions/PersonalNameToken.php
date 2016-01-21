<?php
class GCS_token_definitions_PersonalNameToken extends GCS_fei_definitions_PersonalNameBase
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
