<?php
declare(strict_types=1);

namespace Yireo\ExampleComplexExtensionAttributes\Test\Integration;


use Magento\Framework\Module\ModuleListInterface;

class ModuleExistsTest extends Common
{
    public function testIfModuleShowsUpInList()
    {
        /** @var ModuleListInterface $moduleList */
        $moduleList = $this->createObject(ModuleListInterface::class);
        $this->assertArrayHasKey('Yireo_ExampleComplexExtensionAttributes', $moduleList->getAll());
    }
}