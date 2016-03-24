<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\FraudResults;

/**
 * Class SepaDirectDebitPaymentMethodSpecificOutput
 *
 * @package GCS\payment\definitions
 */
class SepaDirectDebitPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var FraudResults
     */
    public $fraudResults = null;

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
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->fraudResults, true) . '\' is not an object'
                );
            }
            $value = new FraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
        return $this;
    }
}
