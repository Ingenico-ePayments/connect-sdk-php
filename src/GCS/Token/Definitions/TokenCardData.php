<?php
namespace GCS\Token\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\CardWithoutCvv;

/**
 * Class TokenCardData
 *
 * @package GCS\Token\Definitions
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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'cardWithoutCvv')) {
            if (!is_object($object->cardWithoutCvv)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->cardWithoutCvv, true) . '\' is not an object'
                );
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
