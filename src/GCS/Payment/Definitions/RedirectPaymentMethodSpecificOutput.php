<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\BankAccountIban;

/**
 * Class RedirectPaymentMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
 */
class RedirectPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var PaymentProduct836SpecificOutput
     */
    public $paymentProduct836SpecificOutput = null;

    /**
     * @var PaymentProduct840SpecificOutput
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
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountIban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'paymentProduct836SpecificOutput')) {
            if (!is_object($object->paymentProduct836SpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct836SpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new PaymentProduct836SpecificOutput();
            $this->paymentProduct836SpecificOutput = $value->fromObject($object->paymentProduct836SpecificOutput);
        }
        if (property_exists($object, 'paymentProduct840SpecificOutput')) {
            if (!is_object($object->paymentProduct840SpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct840SpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new PaymentProduct840SpecificOutput();
            $this->paymentProduct840SpecificOutput = $value->fromObject($object->paymentProduct840SpecificOutput);
        }
        return $this;
    }
}
