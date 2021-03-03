<?php
namespace Ingenico\Connect\Sdk;

class UuidGeneratorTest extends \PHPUnit\Framework\TestCase
{
    public function testValidUuidV4()
    {
        $uuidV4ValidationRegex = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/';
        $this->assertRegExp($uuidV4ValidationRegex, UuidGenerator::generatedUuid());
    }

    public function testRelativeUniqueness()
    {
        $this->assertNotEquals(UuidGenerator::generatedUuid(), UuidGenerator::generatedUuid());
    }
}
