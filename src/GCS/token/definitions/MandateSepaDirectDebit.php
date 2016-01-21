<?php
class GCS_token_definitions_MandateSepaDirectDebit extends GCS_token_definitions_MandateSepaDirectDebitWithMandateId
{
    /**
     * @var GCS_token_definitions_Creditor
     */
    public $creditor = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'creditor')) {
            if (!is_object($object->creditor)) {
                throw new UnexpectedValueException('value \'' . print_r($object->creditor, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_Creditor();
            $this->creditor = $value->fromObject($object->creditor);
        }
        return $this;
    }
}
