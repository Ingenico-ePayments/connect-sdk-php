<?php
namespace Ingenico\Connect\Sdk;

class UuidGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testValidUuidV4()
    {
        $uuidV4ValidationRegex = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/';
        $uuidGenerator = new UuidGenerator();
        $this->assertRegExp($uuidV4ValidationRegex, $uuidGenerator->generatedUuid());
    }

    public function testRelativeUniqueness()
    {
        $uuidGenerator = new UuidGenerator();
        $this->assertNotEquals($uuidGenerator->generatedUuid(), $uuidGenerator->generatedUuid());
    }

    public function testLastGeneratedUuid()
    {
        $uuidGenerator = new UuidGenerator();
        $uuid = $uuidGenerator->generatedUuid();
        $this->assertEquals($uuid, $uuidGenerator->getLastGeneratedUuid());
        $uuid = $uuidGenerator->generatedUuid();
        $this->assertEquals($uuid, $uuidGenerator->getLastGeneratedUuid());
    }
}
