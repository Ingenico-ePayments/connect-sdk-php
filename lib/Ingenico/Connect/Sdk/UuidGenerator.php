<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class UuidGenerator
 * Generator class for v4 UUID's
 *
 * @package Ingenico\Connect\Sdk
 */
class UuidGenerator
{
    private function __construct()
    {
    }

    /** @return string */
    public static function generatedUuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }
}
