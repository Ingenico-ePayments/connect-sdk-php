<?php

class GCS_IdempotenceException extends GCS_ResponseException
{
    /** @var string */
    protected $idempotenceKey;

    /** @var string */
    protected $idempotenceRequestTimestamp;

    /**
     * @param int $httpStatusCode
     * @param GCS_DataObject $response
     * @param string $message
     * @param string $idempotenceKey
     * @param string $idempotenceRequestTimestamp;
     */
    public function __construct(
        $httpStatusCode,
        GCS_DataObject $response,
        $message = null,
        $idempotenceKey = '',
        $idempotenceRequestTimestamp = ''
    ) {
        parent::__construct($httpStatusCode, $response, $message);
        $this->idempotenceKey = $idempotenceKey;
        $this->idempotenceRequestTimestamp = $idempotenceRequestTimestamp;
    }

    /**
     * @return string
     */
    public function getIdempotenceKey()
    {
        return $this->idempotenceKey;
    }

    /**
     * @return string
     */
    public function getIdempotenceRequestTimestamp()
    {
        return $this->idempotenceRequestTimestamp;
    }
}
