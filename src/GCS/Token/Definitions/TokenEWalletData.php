<?php
namespace GCS\Token\Definitions;

use GCS\DataObject;

/**
 * Class TokenEWalletData
 *
 * @package GCS\Token\Definitions
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
