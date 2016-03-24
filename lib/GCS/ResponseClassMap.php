<?php
namespace GCS;

/**
 * Class ResponseClassMap
 *
 * @package GCS
 */
class ResponseClassMap
{
    /** @var string[]  */
    protected $responseClassNamesByHttpStatusCode = array();

    /**
     * @param int $httpStatusCode
     * @param string $responseClassName
     *
     * @return $this
     */
    public function addResponseClassName($httpStatusCode, $responseClassName)
    {
        $this->responseClassNamesByHttpStatusCode[$httpStatusCode] = $responseClassName;
        return $this;
    }

    /**
     * @param int $httpStatusCode
     *
     * @return string
     */
    public function getResponseClassName($httpStatusCode)
    {
        if (array_key_exists($httpStatusCode, $this->responseClassNamesByHttpStatusCode)) {
            return $this->responseClassNamesByHttpStatusCode[$httpStatusCode];
        }
        return '';
    }
}
