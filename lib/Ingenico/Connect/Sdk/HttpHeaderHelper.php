<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class HttpHeaderHelper
 *
 * @package Ingenico\Connect\Sdk
 */
class HttpHeaderHelper
{
    /**
     * Parses a raw array of HTTP headers into an associative array with the same structure as the output
     * of the get_headers method using the $format = 1 parameter
     * @param string[] $rawHeaders
     * @return array
     */
    public function parseRawHeaders(array $rawHeaders)
    {
        $headers = array();
        $key = '';
        foreach ($rawHeaders as $rawHeader) {
            $rawHeaderLineParts = explode(':', $rawHeader, 2);
            if (isset($rawHeaderLineParts[1])) {
                $key = $rawHeaderLineParts[0];
                $value = trim($rawHeaderLineParts[1]);
                if (!isset($headers[$key])) {
                    $headers[$key] = $value;
                } elseif (is_array($headers[$key])) {
                    $headers[$key][] = $value;
                } else {
                    $headers[$key] = array($headers[$key], $value);
                }
            } elseif (strlen($rawHeaderLineParts[0]) > 0) {
                if (!$key) {
                    $headers[0] = trim($rawHeaderLineParts[0]);
                } elseif (in_array(substr($rawHeaderLineParts[0], 0, 1), array(' ', "\t"))) {
                    if (is_array($headers[$key])) {
                        $lastValue = array_pop($headers[$key]);
                        $headers[$key][] = $lastValue . "\r\n" . rtrim($rawHeaderLineParts[0]);
                    } else {
                        $headers[$key] .= "\r\n" . rtrim($rawHeaderLineParts[0]);
                    }
                }
            }
        }
        return $headers;
    }

    /**
     * Generates an array of raw headers from an associative array of headers with the same structure as the output
     * of the get_headers method using the $format = 1 parameter
     * @param array $headers
     * @return string[]
     */
    public function generateRawHeaders(array $headers)
    {
        $rawHeaders = array();
        foreach ($headers as $key => $values) {
            if (!is_array($values)) {
                $values = array($values);
            }
            foreach ($values as $value) {
                if ($key !== 0) {
                    $rawHeader =  $key . ': ' . $value;
                } else {
                    $rawHeader = $value;
                }
                foreach (explode("\r\n", $rawHeader) as $singleLineRawHeader) {
                    $rawHeaders[] = $singleLineRawHeader;
                }
            }
        }
        return $rawHeaders;
    }

}