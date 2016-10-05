<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class CallContext
 *
 * @package Ingenico\Connect\Sdk
 */
class CallContext
{
    /** @var string */
    private $idempotenceKey = '';

    /** @var string */
    private $idempotenceRequestTimestamp = '';

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
