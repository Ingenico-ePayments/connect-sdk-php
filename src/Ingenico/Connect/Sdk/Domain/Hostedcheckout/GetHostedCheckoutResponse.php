<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions\CreatedPaymentOutput;
use UnexpectedValueException;

/**
 * Class GetHostedCheckoutResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_GetHostedCheckoutResponse GetHostedCheckoutResponse
 */
class GetHostedCheckoutResponse extends DataObject
{
    /**
     * @var CreatedPaymentOutput
     */
    public $createdPaymentOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'createdPaymentOutput')) {
            if (!is_object($object->createdPaymentOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->createdPaymentOutput, true) . '\' is not an object');
            }
            $value = new CreatedPaymentOutput();
            $this->createdPaymentOutput = $value->fromObject($object->createdPaymentOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        return $this;
    }
}
