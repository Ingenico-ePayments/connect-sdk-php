<?php

/** Generator class for v4 UUID's */

class GCS_UuidGenerator
{
    /** @var string */
    protected $lastGeneratedUUID;

    /** @return string */
    public function generatedUuid()
    {
        $this->lastGeneratedUUID = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
        return $this->lastGeneratedUUID;
    }

    /** @return string */
    public function getLastGeneratedUuid()
    {
        return $this->lastGeneratedUUID;
    }

}