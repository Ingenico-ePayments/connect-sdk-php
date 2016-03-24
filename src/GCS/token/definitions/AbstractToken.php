<?php
namespace GCS\token\definitions;

use GCS\DataObject;

/**
 * Class AbstractToken
 *
 * @package GCS\token\definitions
 */
class AbstractToken extends DataObject
{
    /**
     * @var string
     */
    public $alias = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'alias')) {
            $this->alias = $object->alias;
        }
        return $this;
    }
}
