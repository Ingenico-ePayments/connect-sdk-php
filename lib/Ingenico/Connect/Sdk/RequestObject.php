<?php
namespace Ingenico\Connect\Sdk;

use Exception;

/**
 * Class RequestObject
 *
 * @package Ingenico\Connect\Sdk
 */
abstract class RequestObject
{
    public function __set($name, $value)
    {
        throw new Exception('Cannot add new property ' . $name . ' to instances of class ' . get_class($this));
    }
}
