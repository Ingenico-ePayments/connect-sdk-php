<?php

interface GCS_CommunicatorLogger
{
    /**
     * @param $message
     */
    public function log($message);

    /**
     * @param $message
     * @param Exception $exception
     */
    public function logException($message, Exception $exception);
}
