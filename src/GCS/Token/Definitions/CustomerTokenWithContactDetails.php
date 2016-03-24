<?php
namespace GCS\Token\Definitions;

/**
 * Class CustomerTokenWithContactDetails
 *
 * @package GCS\Token\Definitions
 */
class CustomerTokenWithContactDetails extends CustomerToken
{
    /**
     * @var ContactDetailsToken
     */
    public $contactDetails = null;

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
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->contactDetails, true) . '\' is not an object'
                );
            }
            $value = new ContactDetailsToken();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        return $this;
    }
}
