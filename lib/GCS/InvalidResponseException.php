<?php

class GCS_InvalidResponseException extends RuntimeException
{

    /**
     * @var GCS_ConnectionResponse
     */
    public $response;

    /**
     * @param GCS_ConnectionResponse $response
     * @param string $message
     */
    public function __construct(GCS_ConnectionResponse $response, $message = null)
    {
        if (is_null($message)) {
            $message = 'The server returned an invalid response.';
        }
        parent::__construct($message);
        $this->response = $response;
    }

    /**
     * @return GCS_ConnectionResponse
     */
    public function getResponse()
    {
        return $this->response;
    }
}
