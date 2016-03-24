<?php
namespace GCS\Token\Definitions;

use GCS\DataObject;

/**
 * Class AbstractToken
 *
 * @package GCS\Token\Definitions
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
