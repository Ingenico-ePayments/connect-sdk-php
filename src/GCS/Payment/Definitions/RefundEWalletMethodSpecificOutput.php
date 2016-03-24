<?php
namespace GCS\Payment\Definitions;

/**
 * Class RefundEWalletMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
 */
class RefundEWalletMethodSpecificOutput extends RefundMethodSpecificOutput
{
    /**
     * @var RefundPaymentProduct840SpecificOutput
     */
    public $paymentProduct840SpecificOutput = null;

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
        if (property_exists($object, 'paymentProduct840SpecificOutput')) {
            if (!is_object($object->paymentProduct840SpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct840SpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new RefundPaymentProduct840SpecificOutput();
            $this->paymentProduct840SpecificOutput = $value->fromObject($object->paymentProduct840SpecificOutput);
        }
        return $this;
    }
}
