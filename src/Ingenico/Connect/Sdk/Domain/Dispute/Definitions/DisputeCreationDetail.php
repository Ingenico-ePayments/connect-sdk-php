<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Dispute\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Dispute\Definitions
 */
class DisputeCreationDetail extends DataObject
{
    /**
     * @var string
     */
    public $disputeCreationDate = null;

    /**
     * @var string
     */
    public $disputeOriginator = null;

    /**
     * @var string
     */
    public $userName = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'disputeCreationDate')) {
            $this->disputeCreationDate = $object->disputeCreationDate;
        }
        if (property_exists($object, 'disputeOriginator')) {
            $this->disputeOriginator = $object->disputeOriginator;
        }
        if (property_exists($object, 'userName')) {
            $this->userName = $object->userName;
        }
        return $this;
    }
}
