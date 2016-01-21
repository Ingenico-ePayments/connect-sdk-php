<?php
class GCS_fei_definitions_CardFraudResults extends GCS_fei_definitions_FraudResults
{
    /**
     * @var string
     */
    public $avsResult = null;

    /**
     * @var string
     */
    public $cvvResult = null;

    /**
     * @var GCS_fei_definitions_FraudResultsRetailDecisions
     */
    public $retailDecisions = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'avsResult')) {
            $this->avsResult = $object->avsResult;
        }
        if (property_exists($object, 'cvvResult')) {
            $this->cvvResult = $object->cvvResult;
        }
        if (property_exists($object, 'retailDecisions')) {
            if (!is_object($object->retailDecisions)) {
                throw new UnexpectedValueException('value \'' . print_r($object->retailDecisions, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_FraudResultsRetailDecisions();
            $this->retailDecisions = $value->fromObject($object->retailDecisions);
        }
        return $this;
    }
}
