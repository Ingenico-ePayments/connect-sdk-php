<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class HeaderObfuscator
 *
 * @package Ingenico\Connect\Sdk
 */
class HeaderObfuscator
{
    /** @var ValueObfuscator */
    protected $valueObfuscator;

    public function __construct()
    {
        $this->valueObfuscator = new ValueObfuscator();
    }

    /**
     * @param string[] $headers
     * @return string[]
     */
    public function obfuscateHeaders(array $headers)
    {
        foreach ($headers as $headerName => &$headerValue) {
            $headerValue = $this->obfuscateHeaderValue($headerName, $headerValue);
        }
        return $headers;
    }

    /**
     * @param $key
     * @param $value
     * @return string
     */
    protected function obfuscateHeaderValue($key, $value)
    {
        switch (mb_strtolower(strval($key), 'UTF-8')) {
            case 'authorization':
            case 'www-authenticate':
            case 'proxy-authenticate':
            case 'proxy-authorization':
            case 'x-gcs-authentication-token':
            case 'x-gcs-callerpassword':
                return $this->replaceHeaderValueWithFixedNumberOfCharacters($value, 8);
            default:
                return $value;
        }
    }

    /**
     * @param $value
     * @param $numberOfCharacters
     * @return array|string
     */
    protected function replaceHeaderValueWithFixedNumberOfCharacters($value, $numberOfCharacters)
    {
        if (is_array($value)) {
            return array_fill(0, count($value), $this->valueObfuscator->obfuscateFixedLength($numberOfCharacters));
        } else {
            return $this->valueObfuscator->obfuscateFixedLength($numberOfCharacters);
        }
    }
}
