<?php
namespace GCS\token\definitions;

/**
 * Class TokenSepaDirectDebit
 *
 * @package GCS\token\definitions
 */
class TokenSepaDirectDebit extends AbstractToken
{
    /**
     * @var CustomerTokenWithContactDetails
     */
    public $customer = null;

    /**
     * @var MandateSepaDirectDebit
     */
    public $mandate = null;

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
            $value = new CustomerTokenWithContactDetails();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'mandate')) {
            if (!is_object($object->mandate)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->mandate, true) . '\' is not an object'
                );
            }
            $value = new MandateSepaDirectDebit();
            $this->mandate = $value->fromObject($object->mandate);
        }
        return $this;
    }
}
