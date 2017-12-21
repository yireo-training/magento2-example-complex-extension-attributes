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
<<<<<<< HEAD
        $this->assertArrayHasKey('Yireo_ExampleComplexExtensionAttributes', $moduleList->getAll());
=======
        $this->assertArrayHasKey('Yireo_ExampleSimpleExtensionAttributes', $moduleList->getAll());
>>>>>>> e03cf9c1f5e189342e7ec5cfe29a1fdeb82a0857
    }
}