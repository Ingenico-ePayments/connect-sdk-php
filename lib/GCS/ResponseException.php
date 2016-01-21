<?php

class GCS_ResponseException extends RuntimeException
{
    /** @var int */
    protected $httpStatusCode;

    /**
     * @var GCS_DataObject
     */
    protected $response;

    /**
     * @param int $httpStatusCode
     * @param GCS_DataObject $response
     * @param string $message
     */
    public function __construct($httpStatusCode, GCS_DataObject $response, $message = null)
    {
        if (is_null($message)) {
            $message = 'The server returned an error.';
        }
        parent::__construct($message);
        $this->httpStatusCode = $httpStatusCode;
        $this->response = $response;
    }

    public function __toString()
    {
        return sprintf(
            "exception '%s' with message '%s'. in %s:%d\nHTTP status code: %s\nResponse:\n%s\nStack trace:\n%s",
            __CLASS__,
            $this->getMessage(),
            $this->getFile(),
            $this->getLine(),
            $this->getHttpStatusCode(),
            json_encode($this->getResponse(), JSON_PRETTY_PRINT),
            $this->getTraceAsString()
        );
    }

    /**
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * @return GCS_DataObject
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getErrorId()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('errorId', $responseVariables)) {
            return '';
        }
        return $responseVariables['errorId'];
    }

    /**
     * @return GCS_errors_definitions_APIError[]
     */
    public function getErrors()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('errors', $responseVariables)) {
            return array();
        }
        $errors = $responseVariables['errors'];
        if (!is_array($errors)) {
            return array();
        }
        foreach ($errors as $error) {
            if (!($error instanceof GCS_errors_definitions_APIError)) {
                return array();
            }
        }
        return $errors;
    }
}
