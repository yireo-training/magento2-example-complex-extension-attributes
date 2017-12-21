<?php
declare(strict_types=1);

namespace Yireo\ExampleComplexExtensionAttributes\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 *
 * @package Yireo\ExampleComplexExtensionAttributes\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $installer
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $installer, ModuleContextInterface $context)
    {
        $installer->startSetup();
        $connection = $installer->getConnection();

        $table = $connection->newTable(
<<<<<<< HEAD
            $installer->getTable('example_complex_extension_attributes')
=======
            $installer->getTable('example_simple_extension_attributes')
>>>>>>> e03cf9c1f5e189342e7ec5cfe29a1fdeb82a0857
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'product_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => false, 'unsigned' => true, 'nullable' => false, 'primary' => false],
            'Product ID'
        )->addColumn(
            'training_date_start',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Training Date Start'
        )->addColumn(
            'training_date_end',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Training Date End'
        )->setComment(
            'Yireo_ExampleSimpleExtensionAttributes Table'
        );

        $connection->createTable($table);
        $installer->endSetup();
    }
}