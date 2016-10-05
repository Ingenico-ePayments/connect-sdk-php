<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Sessions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Sessions\Definitions\PaymentProductFiltersClientSession;
use UnexpectedValueException;

/**
 * Class SessionRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Sessions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_SessionRequest SessionRequest
 */
class SessionRequest extends DataObject
{
    /**
     * @var PaymentProductFiltersClientSession
     */
    public $paymentProductFilters = null;

    /**
     * @var string[]
     */
    public $tokens = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'paymentProductFilters')) {
            if (!is_object($object->paymentProductFilters)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProductFilters, true) . '\' is not an object');
            }
            $value = new PaymentProductFiltersClientSession();
            $this->paymentProductFilters = $value->fromObject($object->paymentProductFilters);
        }
        if (property_exists($object, 'tokens')) {
            if (!is_array($object->tokens) && !is_object($object->tokens)) {
                throw new UnexpectedValueException('value \'' . print_r($object->tokens, true) . '\' is not an array or object');
            }
            $this->tokens = [];
            foreach ($object->tokens as $tokensElementObject) {
                $this->tokens[] = $tokensElementObject;
            }
        }
        return $this;
    }
}
