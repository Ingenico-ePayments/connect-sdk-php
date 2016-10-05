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

    public function __construct($creator, $name, $version)
    {
        $this->creator = $creator;
        $this->name = $name;
        $this->version = $version;
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
        return $this;
    }
}
