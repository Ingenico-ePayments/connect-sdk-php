<?php
namespace Ingenico\Connect\Sdk;

/**
 * @group default_connection
 *
 */
class DefaultConnectionResponseGetDispositionFilenameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider dispositionFilenameProvider
     */
    public function testGetDispositionFilename($headerValue, $expected)
    {
        $headers = array('Content-Disposition' => $headerValue);
        $this->assertEquals($expected, DefaultConnectionResponse::getDispositionFilename($headers));
    }

    public function  dispositionFilenameProvider()
    {
        return array(
            array('attachment; filename=testfile',   'testfile'),
            array('attachment; filename="testfile"', 'testfile'),
            array('attachment; filename="testfile',  '"testfile'),
            array('attachment; filename=testfile"',  'testfile"'),
            array("attachment; filename='testfile'", 'testfile'),
            array("attachment; filename='testfile",  "'testfile"),
            array("attachment; filename=testfile'",  "testfile'"),

            array('filename=testfile',   'testfile'),
            array('filename="testfile"', 'testfile'),
            array('filename="testfile',  '"testfile'),
            array('filename=testfile"',  'testfile"'),
            array("filename='testfile'", 'testfile'),
            array("filename='testfile",  "'testfile"),
            array("filename=testfile'",  "testfile'"),
            array('attachment; filename=testfile; x=y',   'testfile'),
            array('attachment; filename="testfile"; x=y', 'testfile'),
            array('attachment; filename="testfile; x=y',  '"testfile'),
            array('attachment; filename=testfile"; x=y',  'testfile"'),
            array("attachment; filename='testfile'; x=y", 'testfile'),
            array("attachment; filename='testfile; x=y",  "'testfile"),
            array("attachment; filename=testfile'; x=y",  "testfile'"),

            array('', null),
            array('filename="', '"'),
            array("filename='", "'")
        );
    }
}
