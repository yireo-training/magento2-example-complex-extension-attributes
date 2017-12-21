<?php
declare(strict_types=1);

namespace Yireo\ExampleComplexExtensionAttributes\Test\Integration;

use Symfony\Component\Console\Tester\CommandTester;
use Yireo\ExampleComplexExtensionAttributes\Command\Test;

class CommandTest extends Common
{
    public function testIfCommandIsThere()
    {
        $targetCommand = $this->createObject(Test::class);
        $commandTester = new CommandTester($targetCommand);

        $commandTester->execute([]);
        $this->assertNotEmpty(trim($commandTester->getDisplay()));
    }
}
