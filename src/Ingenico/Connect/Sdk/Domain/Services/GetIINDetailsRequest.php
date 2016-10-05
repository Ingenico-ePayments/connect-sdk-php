<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Services;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Services\Definitions\PaymentContext;
use UnexpectedValueException;

/**
 * Class GetIINDetailsRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Services
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_GetIINDetailsRequest GetIINDetailsRequest
 */
class GetIINDetailsRequest extends DataObject
{
    /**
     * @var string
     */
    public $bin = null;

    /**
     * @var PaymentContext
     */
    public $paymentContext = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bin')) {
            $this->bin = $object->bin;
        }
        if (property_exists($object, 'paymentContext')) {
            if (!is_object($object->paymentContext)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentContext, true) . '\' is not an object');
            }
            $value = new PaymentContext();
            $this->paymentContext = $value->fromObject($object->paymentContext);
        }
        return $this;
    }
}
