<?php
declare(strict_types=1);

namespace Yireo\ExampleComplexExtensionAttributes\Test\Integration;

use Symfony\Component\Console\Tester\CommandTester;
use Yireo\ExampleComplexExtensionAttributes\Command\Listing;

class CommandTest extends Common
{
    public function testIfCommandIsThere()
    {
        $targetCommand = $this->createObject(Listing::class);
        $commandTester = new CommandTester($targetCommand);

        $commandTester->execute([]);
        $this->assertNotEmpty(trim($commandTester->getDisplay()));
    }
}
