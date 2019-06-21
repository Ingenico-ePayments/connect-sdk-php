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
class CustomerPaymentActivity extends DataObject
{
    /**
     * @var int
     */
    public $numberOfPaymentAttemptsLast24Hours = null;

    /**
     * @var int
     */
    public $numberOfPaymentAttemptsLastYear = null;

    /**
     * @var int
     */
    public $numberOfPurchasesLast6Months = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->numberOfPaymentAttemptsLast24Hours)) {
            $object->numberOfPaymentAttemptsLast24Hours = $this->numberOfPaymentAttemptsLast24Hours;
        }
        if (!is_null($this->numberOfPaymentAttemptsLastYear)) {
            $object->numberOfPaymentAttemptsLastYear = $this->numberOfPaymentAttemptsLastYear;
        }
        if (!is_null($this->numberOfPurchasesLast6Months)) {
            $object->numberOfPurchasesLast6Months = $this->numberOfPurchasesLast6Months;
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
        if (property_exists($object, 'numberOfPaymentAttemptsLast24Hours')) {
            $this->numberOfPaymentAttemptsLast24Hours = $object->numberOfPaymentAttemptsLast24Hours;
        }
        if (property_exists($object, 'numberOfPaymentAttemptsLastYear')) {
            $this->numberOfPaymentAttemptsLastYear = $object->numberOfPaymentAttemptsLastYear;
        }
        if (property_exists($object, 'numberOfPurchasesLast6Months')) {
            $this->numberOfPurchasesLast6Months = $object->numberOfPurchasesLast6Months;
        }
        return $this;
    }
}
