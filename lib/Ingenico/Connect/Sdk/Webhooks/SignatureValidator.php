<?php
namespace Ingenico\Connect\Sdk\Webhooks;

/**
 * Class SignatureValidator
 *
 * @package Ingenico\Connect\Sdk\Webhooks
 */
class SignatureValidator
{
    /** @var SecretKeyStore */
    private $secretKeyStore;

    /**
     * @param SecretKeyStore $secretKeyStore
     */
    public function __construct(SecretKeyStore $secretKeyStore)
    {
        $this->secretKeyStore = $secretKeyStore;
    }

    /**
     * Validates the given body using the given request headers.
     * @param string $body
     * @param array $requestHeaders
     * @throws SignatureValidationException
     */
    public function validate($body, $requestHeaders)
    {
        $this->validateBody($body, $requestHeaders);
    }

    // utility methods

    private function validateBody($body, $requestHeaders)
    {
        $signature = $this->getHeaderValue($requestHeaders, 'X-GCS-Signature');
        $keyId = $this->getHeaderValue($requestHeaders, 'X-GCS-KeyId');
        $secretKey = $this->secretKeyStore->getSecretKey($keyId);

        $expectedSignature = base64_encode(hash_hmac("sha256", $body, $secretKey, true));

        $isValid = $this->areEqualSignatures($signature, $expectedSignature);
        if (!$isValid) {
            throw new SignatureValidationException("failed to validate signature '$signature'");
        }
    }

    private function areEqualSignatures($signature, $expectedSignature) {
        if (function_exists('hash_equals')) {
            return hash_equals($expectedSignature, $signature);
        } else {
            // copied from http://php.net/manual/en/function.hash-equals.php#115635
            if(strlen($expectedSignature) != strlen($signature)) {
                return false;
            } else {
                $res = $expectedSignature ^ $signature;
                $ret = 0;
                for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
                return !$ret;
            }
        }
    }

    // general utility methods

    private function getHeaderValue($requestHeaders, $headerName) {
        $lowerCaseHeaderName = strtolower($headerName);
        foreach ($requestHeaders as $name => $value) {
            if ($lowerCaseHeaderName === strtolower($name)) {
                return $value;
            }
        }
        throw new SignatureValidationException("could not find header '$headerName'");
    }
}
