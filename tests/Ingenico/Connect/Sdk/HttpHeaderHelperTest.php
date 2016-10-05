<?php
namespace Ingenico\Connect\Sdk;

class HttpHeaderHelperTest extends TestCase
{
    /** @var HttpHeaderHelper */
    protected $httpHeaderHelper;

    public function __construct()
    {
        parent::__construct();
        $this->httpHeaderHelper = new HttpHeaderHelper();
    }

    public function testGenerateStatusLine()
    {
        $rawHeaders = array('HTTP/1.0 200 OK');
        $headers = array('HTTP/1.0 200 OK');
        $this->assertEquals($rawHeaders, $this->httpHeaderHelper->generateRawHeaders($headers));
    }

    public function testParseStatusLine()
    {
        $rawHeaders = array('HTTP/1.0 200 OK');
        $headers = array('HTTP/1.0 200 OK');
        $this->assertEquals($headers, $this->httpHeaderHelper->parseRawHeaders($rawHeaders));
    }

    public function testGenerateContentTypeHeader()
    {
        $rawHeaders = array('Content-Type: text/html');
        $headers = array('Content-Type' => 'text/html');
        $this->assertEquals($rawHeaders, $this->httpHeaderHelper->generateRawHeaders($headers));
    }

    public function testParseContentTypeHeader()
    {
        $rawHeaders = array('Content-Type: text/html');
        $headers = array('Content-Type' => 'text/html');
        $this->assertEquals($headers, $this->httpHeaderHelper->parseRawHeaders($rawHeaders));
    }

    public function testGenerateDuplicateHeader()
    {
        $rawHeaders = array('Cache-Control: no-cache', 'Cache-Control: no-store');
        $headers = array('Cache-Control' => array('no-cache', 'no-store'));
        $this->assertEquals($rawHeaders, $this->httpHeaderHelper->generateRawHeaders($headers));
    }

    public function testParseDuplicateHeader()
    {
        $rawHeaders = array('Cache-Control: no-cache', 'Cache-Control: no-store');
        $headers = array('Cache-Control' => array('no-cache', 'no-store'));
        $this->assertEquals($headers, $this->httpHeaderHelper->parseRawHeaders($rawHeaders));
    }

    public function testGenerateMultiLineHeader()
    {
        $rawHeaders = array('Powered-By: Acme', "\tInc.");
        $headers = array('Powered-By' => "Acme\r\n\tInc.");
        $this->assertEquals($rawHeaders, $this->httpHeaderHelper->generateRawHeaders($headers));
    }

    public function testParseMultiLineHeader()
    {
        $rawHeaders = array('Powered-By: Acme', "\tInc.");
        $headers = array('Powered-By' => "Acme\r\n\tInc.");
        $this->assertEquals($headers, $this->httpHeaderHelper->parseRawHeaders($rawHeaders));
    }

    public function testGenerateStatusLineAndContentTypeHeader()
    {
        $rawHeaders = array('HTTP/1.0 200 OK', 'Content-Type: text/html');
        $headers = array('HTTP/1.0 200 OK', 'Content-Type' => 'text/html');
        $this->assertEquals($rawHeaders, $this->httpHeaderHelper->generateRawHeaders($headers));
    }

    public function testParseStatusLineAndContentTypeHeader()
    {
        $rawHeaders = array('HTTP/1.0 200 OK', 'Content-Type: text/html');
        $headers = array('HTTP/1.0 200 OK', 'Content-Type' => 'text/html');
        $this->assertEquals($headers, $this->httpHeaderHelper->parseRawHeaders($rawHeaders));
    }

    public function testGenerateParseStatusLineAndSimpleHeaders()
    {
        $headers = array(
            0 => 'HTTP/1.1 200 OK',
            'Date' => 'Wed, 23 Mar 2016 20:43:06 GMT',
            'Content-Type' => 'application/json',
            'X-Powered-By' => 'Servlet/3.0 JSP/2.2'
        );
        $rawHeader = $this->httpHeaderHelper->generateRawHeaders($headers);
        $this->assertEquals($headers, $this->httpHeaderHelper->parseRawHeaders($rawHeader));
    }

    public function testGenerateParseStatusLineAndDuplicateHeaders()
    {
        $headers = array(
            0 => 'HTTP/1.1 200 OK',
            'Date' => 'Wed, 23 Mar 2016 20:43:06 GMT',
            'Content-Type' => 'application/json',
            'Cache-Control' => array('no-cache', 'no-store')
        );
        $rawHeader = $this->httpHeaderHelper->generateRawHeaders($headers);
        $this->assertEquals($headers, $this->httpHeaderHelper->parseRawHeaders($rawHeader));
    }
}