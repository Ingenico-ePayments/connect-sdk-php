<?php

class GCS_CallContext
{
    /** @var string */
    protected $idempotenceKey = '';

    /** @var string */
    protected $idempotenceRequestTimestamp = '';

    /**
     * @return string
     */
    public function getIdempotenceKey()
    {
        return $this->idempotenceKey;
    }

    /**
     * @param string $idempotenceKey
     */
    public function setIdempotenceKey($idempotenceKey)
    {
        $this->idempotenceKey = $idempotenceKey;
    }

    /**
     * @return string
     */
    public function getIdempotenceRequestTimestamp()
    {
        return $this->idempotenceRequestTimestamp;
    }

    /**
     * @param string $idempotenceRequestTimestamp
     */
    public function setIdempotenceRequestTimestamp($idempotenceRequestTimestamp)
    {
        $this->idempotenceRequestTimestamp = $idempotenceRequestTimestamp;
    }
}
