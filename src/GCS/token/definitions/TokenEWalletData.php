<?php
namespace GCS\token\definitions;

use GCS\DataObject;

/**
 * Class TokenEWalletData
 *
 * @package GCS\token\definitions
 */
class TokenEWalletData extends DataObject
{
    /**
     * @var string
     */
    public $billingAgreementId = null;

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
        if (property_exists($object, 'billingAgreementId')) {
            $this->billingAgreementId = $object->billingAgreementId;
        }
        return $this;
    }
}
