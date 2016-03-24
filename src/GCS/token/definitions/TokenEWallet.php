<?php
namespace GCS\token\definitions;

/**
 * Class TokenEWallet
 *
 * @package GCS\token\definitions
 */
class TokenEWallet extends AbstractToken
{
    /**
     * @var CustomerToken
     */
    public $customer = null;

    /**
     * @var TokenEWalletData
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
            $value = new TokenEWalletData();
            $this->data = $value->fromObject($object->data);
        }
        return $this;
    }
}
