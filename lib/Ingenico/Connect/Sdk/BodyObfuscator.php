<?php
namespace Ingenico\Connect\Sdk;

use UnexpectedValueException;

/**
 * Class BodyObfuscator
 *
 * @package Ingenico\Connect\Sdk
 */
class BodyObfuscator
{
    const MIME_APPLICATION_JSON = 'application/json';

    /** @var  ValueObfuscator */
    protected $valueObfuscator;

    public function __construct()
    {
        $this->valueObfuscator = new ValueObfuscator();
    }

    /**
     * @param string $contentType
     * @param string $body
     * @return mixed
     */
    public function obfuscateBody($contentType, $body)
    {
        if ($contentType != static::MIME_APPLICATION_JSON) {
            return $body;
        }
        $decodedJsonBody = json_decode($body);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $body;
        }
        return json_encode($this->obfuscateDecodedJsonPart($decodedJsonBody), JSON_PRETTY_PRINT);

    }

    /**
     * @param $value
     * @return mixed
     */
    protected function obfuscateDecodedJsonPart($value)
    {
        if (is_object($value)) {
            foreach ($value as $propertyName => $propertyValue) {
                if (is_scalar($propertyValue)) {
                    $value->$propertyName = $this->obfuscateScalarValue($propertyName, $propertyValue);
                    continue;
                }
                $value->$propertyName = $this->obfuscateDecodedJsonPart($propertyValue);
            }
        }
        if (is_array($value)) {
            foreach ($value as $elementKey => &$elementValue) {
                if (is_scalar($elementValue)) {
                    $elementValue = $this->obfuscateScalarValue($elementKey, $elementValue);
                    continue;
                }
                $elementValue = $this->obfuscateDecodedJsonPart($elementValue);
            }

        }
        return $value;
    }

    /**
     * @param $key
     * @param $value
     * @return string
     */
    protected function obfuscateScalarValue($key, $value)
    {
        if (!is_scalar($value)) {
            throw new UnexpectedValueException('scalar value expected');
        }
        switch (mb_strtolower(strval($key), 'UTF-8')) {
            case 'keyid':
            case 'secretkey':
            case 'publickey':
            case 'userauthenticationtoken':
            case 'encryptedpayload':
            case 'decryptedpayload':
            case 'encryptedcustomerinput':
                return $this->valueObfuscator->obfuscateFixedLength(8);
            case 'cvv':
            case 'value':
                return $this->valueObfuscator->obfuscateAll($value);
            case 'bin':
                return $this->valueObfuscator->obfuscateAllKeepStart($value, 6);
            case 'accountnumber':
            case 'cardnumber':
            case 'iban':
            case 'reformattedaccountnumber':
                return $this->valueObfuscator->obfuscateAllKeepEnd($value, 4);
            case 'expirydate':
                return $this->valueObfuscator->obfuscateAllKeepEnd($value, 2);
            default:
                return $value;
        }
    }
}
