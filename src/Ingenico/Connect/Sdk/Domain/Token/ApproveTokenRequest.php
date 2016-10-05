<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token;

use Ingenico\Connect\Sdk\Domain\Token\Definitions\MandateApproval;
use UnexpectedValueException;

/**
 * Class ApproveTokenRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Token
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ApproveTokenRequest ApproveTokenRequest
 */
class ApproveTokenRequest extends MandateApproval
{
    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        return $this;
    }
}
