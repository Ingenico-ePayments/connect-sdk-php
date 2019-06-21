<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class PaymentAccountOnFile extends DataObject
{
    /**
     * @var string
     */
    public $createDate = null;

    /**
     * @var int
     */
    public $numberOfCardOnFileCreationAttemptsLast24Hours = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->createDate)) {
            $object->createDate = $this->createDate;
        }
        if (!is_null($this->numberOfCardOnFileCreationAttemptsLast24Hours)) {
            $object->numberOfCardOnFileCreationAttemptsLast24Hours = $this->numberOfCardOnFileCreationAttemptsLast24Hours;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'createDate')) {
            $this->createDate = $object->createDate;
        }
        if (property_exists($object, 'numberOfCardOnFileCreationAttemptsLast24Hours')) {
            $this->numberOfCardOnFileCreationAttemptsLast24Hours = $object->numberOfCardOnFileCreationAttemptsLast24Hours;
        }
        return $this;
    }
}
