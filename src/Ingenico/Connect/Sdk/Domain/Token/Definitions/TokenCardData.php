<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\CardWithoutCvv;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class TokenCardData extends DataObject
{
    /**
     * @var CardWithoutCvv
     */
    public $cardWithoutCvv = null;

    /**
     * @var string
     */
    public $firstTransactionDate = null;

    /**
     * @var string
     */
    public $providerReference = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->cardWithoutCvv)) {
            $object->cardWithoutCvv = $this->cardWithoutCvv->toObject();
        }
        if (!is_null($this->firstTransactionDate)) {
            $object->firstTransactionDate = $this->firstTransactionDate;
        }
        if (!is_null($this->providerReference)) {
            $object->providerReference = $this->providerReference;
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
        if (property_exists($object, 'cardWithoutCvv')) {
            if (!is_object($object->cardWithoutCvv)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardWithoutCvv, true) . '\' is not an object');
            }
            $value = new CardWithoutCvv();
            $this->cardWithoutCvv = $value->fromObject($object->cardWithoutCvv);
        }
        if (property_exists($object, 'firstTransactionDate')) {
            $this->firstTransactionDate = $object->firstTransactionDate;
        }
        if (property_exists($object, 'providerReference')) {
            $this->providerReference = $object->providerReference;
        }
        return $this;
    }
}
