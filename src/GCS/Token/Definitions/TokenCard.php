<?php
namespace GCS\Token\Definitions;

/**
 * Class TokenCard
 *
 * @package GCS\Token\Definitions
 */
class TokenCard extends AbstractToken
{
    /**
     * @var CustomerToken
     */
    public $customer = null;

    /**
     * @var TokenCardData
     */
    public $data = null;

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
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->customer, true) . '\' is not an object'
                );
            }
            $value = new CustomerToken();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'data')) {
            if (!is_object($object->data)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->data, true) . '\' is not an object'
                );
            }
            $value = new TokenCardData();
            $this->data = $value->fromObject($object->data);
        }
        return $this;
    }
}
