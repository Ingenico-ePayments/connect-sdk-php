<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant\Disputes;

use Ingenico\Connect\Sdk\MultipartDataObject;
use Ingenico\Connect\Sdk\MultipartFormDataObject;
use Ingenico\Connect\Sdk\UploadableFile;

/**
 * Multipart/form-data parameters for Upload File
 *
 * @package Ingenico\Connect\Sdk\Merchant\Disputes
 * @link https://epayments-api.developer-ingenico.com/fileserviceapi/v1/en_US/php/disputes/uploadFile.html Upload File
 */
class UploadFileRequest extends MultipartDataObject
{
    /**
     * @var UploadableFile
     */
    public $file;

    public function toMultipartFormDataObject()
    {
        $result = new MultipartFormDataObject();
        if (!is_null($this->file)) {
            $result->addFile("file", $this->file);
        }
        return $result;
    }
}
