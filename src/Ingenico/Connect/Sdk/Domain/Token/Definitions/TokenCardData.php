<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\CardWithoutCvv;
use UnexpectedValueException;

/**
 * Class TokenCardData
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_TokenCardData TokenCardData
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
