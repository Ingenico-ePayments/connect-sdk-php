<?php
namespace GCS;

/**
 * Class InvalidResponseException
 *
 * @package GCS
 */
class InvalidResponseException extends \RuntimeException
{

    /**
     * @var ConnectionResponse
     */
    public $response;

    /**
     * @param ConnectionResponse $response
     * @param string $message
     */
    public function __construct(ConnectionResponse $response, $message = null)
    {
        if (is_null($message)) {
            $message = 'The server returned an invalid response.';
        }
        parent::__construct($message);
        $this->response = $response;
    }

    /**
     * @return ConnectionResponse
     */
    public function getResponse()
    {
        return $this->response;
    }
}
