<?php
namespace GCS\Token\Definitions;

/**
 * Class MandateSepaDirectDebit
 *
 * @package GCS\Token\Definitions
 */
class MandateSepaDirectDebit extends MandateSepaDirectDebitWithMandateId
{
    /**
     * @var Creditor
     */
    public $creditor = null;

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
        if (property_exists($object, 'creditor')) {
            if (!is_object($object->creditor)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->creditor, true) . '\' is not an object'
                );
            }
            $value = new Creditor();
            $this->creditor = $value->fromObject($object->creditor);
        }
        return $this;
    }
}
