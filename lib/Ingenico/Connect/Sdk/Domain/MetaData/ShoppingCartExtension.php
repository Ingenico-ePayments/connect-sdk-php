<?php
namespace Ingenico\Connect\Sdk\Domain\MetaData;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ShoppingCartExtension
 *
 * @package Ingenico\Connect\Sdk\Domain\MetaData
 */
class ShoppingCartExtension extends DataObject
{
    /**
     * @var string
     */
    public $creator = null;

    /**
     * @var string
     */
    public $name = null;

    /**
     * @var string
     */
    public $version = null;

    /**
     * @var string
     */
    public $extensionId = null;

    public function __construct($creator, $name, $version, $extensionId = null)
    {
        $this->creator = $creator;
        $this->name = $name;
        $this->version = $version;
        $this->extensionId = $extensionId;
    }

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->creator)) {
            $object->creator = $this->creator;
        }
        if (!is_null($this->name)) {
            $object->name = $this->name;
        }
        if (!is_null($this->version)) {
            $object->version = $this->version;
        }
        if (!is_null($this->extensionId)) {
            $object->extensionId = $this->extensionId;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'creator')) {
            $this->creator = $object->creator;
        }
        if (property_exists($object, 'name')) {
            $this->name = $object->name;
        }
        if (property_exists($object, 'version')) {
            $this->version = $object->version;
        }
        if (property_exists($object, 'extensionId')) {
            $this->extensionId = $object->extensionId;
        }
        return $this;
    }
}
