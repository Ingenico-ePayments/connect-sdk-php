<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class TokenEWalletData
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_TokenEWalletData TokenEWalletData
 */
class TokenEWalletData extends DataObject
{
    /**
     * @var string
     */
    public $billingAgreementId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
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
