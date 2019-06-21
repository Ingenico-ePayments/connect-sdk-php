<?php
namespace Ingenico\Connect\Sdk\Webhooks;

use Exception;

/**
 * Class SecretKeyNotAvailableException
 *
 * @package Ingenico\Connect\Sdk\Webhooks
 */
class SecretKeyNotAvailableException extends SignatureValidationException
{
    /** @var string */
    private $keyId;

    /**
     * @param string $keyId
     * @param string $message
     * @param Exception @previous
     */
    public function __construct($keyId, $message = null, $previous = null)
    {
        parent::__construct($message, $previous);
        $this->keyId = $keyId;
    }

    /**
     * @return string
     */
    public function getKeyId()
    {
        return $this->keyId;
    }
}
