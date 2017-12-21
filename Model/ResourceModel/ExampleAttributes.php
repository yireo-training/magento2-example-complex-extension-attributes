<?php
namespace Yireo\ExampleComplexExtensionAttributes\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class ExampleAttributes
 *
 * @package Yireo\ExampleComplexExtensionAttributes\Model\ResourceModel
 */
class ExampleAttributes extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('example_complex_extension_attributes', 'id');
    }
}