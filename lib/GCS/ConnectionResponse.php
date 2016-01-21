<?php

interface GCS_ConnectionResponse
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
