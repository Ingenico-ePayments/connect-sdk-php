<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\FraudResults;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AbstractPaymentMethodSpecificOutput;
use UnexpectedValueException;

/**
 * Class SepaDirectDebitPaymentMethodSpecificOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_SepaDirectDebitPaymentMethodSpecificOutput SepaDirectDebitPaymentMethodSpecificOutput
 */
class SepaDirectDebitPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var FraudResults
     */
    public $fraudResults = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudResults, true) . '\' is not an object');
            }
            $value = new FraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
        return $this;
    }
}
