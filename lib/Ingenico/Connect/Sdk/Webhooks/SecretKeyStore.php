<?php
namespace Ingenico\Connect\Sdk\Webhooks;

/**
 * Class SecretKeyStore
 * A store of secret keys. Implementations could store secret keys in a database, on disk, etc.
 *
 * @package Ingenico\Connect\Sdk\Webhooks
 */
interface SecretKeyStore
{
    /**
     * @param string $keyId
     * @return string The secret key for the given key id.
     * @throws SecretKeyNotAvailableException If the secret key for the given key id is not available.
     */
    public function getSecretKey($keyId);
}
