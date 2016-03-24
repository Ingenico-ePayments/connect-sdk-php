<?php
namespace GCS;

/**
 * Interface ConnectionResponse
 *
 * @package GCS
 */
interface ConnectionResponse
{
    /**
     * @return string
     */
    public function getContentType();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return string
     */
    public function getHttpStatusCode();
}
