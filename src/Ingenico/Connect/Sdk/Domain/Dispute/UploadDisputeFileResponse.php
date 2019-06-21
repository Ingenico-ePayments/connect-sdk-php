<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Dispute;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Dispute
 */
class UploadDisputeFileResponse extends DataObject
{
    /**
     * @var string
     */
    public $disputeId = null;

    /**
     * @var string
     */
    public $fileId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->disputeId)) {
            $object->disputeId = $this->disputeId;
        }
        if (!is_null($this->fileId)) {
            $object->fileId = $this->fileId;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'disputeId')) {
            $this->disputeId = $object->disputeId;
        }
        if (property_exists($object, 'fileId')) {
            $this->fileId = $object->fileId;
        }
        return $this;
    }
}
