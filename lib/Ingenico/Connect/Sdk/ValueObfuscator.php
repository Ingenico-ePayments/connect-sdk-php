<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class ValueObfuscator
 *
 * @package Ingenico\Connect\Sdk
 */
class ValueObfuscator
{
    /** */
    const MASK_CHARACTER = '*';

    /**
     * @param string $value
     * @param int $numberOfCharactersToKeep
     * @return string
     */
    public function obfuscateAllKeepEnd($value, $numberOfCharactersToKeep)
    {
        if ($numberOfCharactersToKeep <= 0) {
            return $this->obfuscateAll($value);
        }
        if (mb_strlen($value, 'UTF-8') <= $numberOfCharactersToKeep) {
            return $value;
        }
        return
            str_repeat(static::MASK_CHARACTER, mb_strlen($value, 'UTF-8') - $numberOfCharactersToKeep) .
            mb_substr($value, mb_strlen($value, 'UTF-8') - $numberOfCharactersToKeep, null, 'UTF-8')
            ;
    }

    /**
     * @param string $value
     * @param int $numberOfCharactersToKeep
     * @return string
     */
    public function obfuscateAllKeepStart($value, $numberOfCharactersToKeep)
    {
        if ($numberOfCharactersToKeep <= 0) {
            return $this->obfuscateAll($value);
        }
        if (mb_strlen($value, 'UTF-8') <= $numberOfCharactersToKeep) {
            return $value;
        }
        return
            mb_substr($value, 0, $numberOfCharactersToKeep, 'UTF-8') .
            str_repeat(static::MASK_CHARACTER, mb_strlen($value, 'UTF-8') - $numberOfCharactersToKeep)
            ;
    }

    /**
     * @param string $value
     * @return string
     */
    public function obfuscateAll($value)
    {
        return str_repeat(static::MASK_CHARACTER, mb_strlen($value, 'UTF-8'));
    }

    /**
     * @param int $length
     * @return string
     */
    public function obfuscateFixedLength($length)
    {
        if ($length <= 0) {
            return '';
        }
        return str_repeat(static::MASK_CHARACTER, $length);
    }
}
