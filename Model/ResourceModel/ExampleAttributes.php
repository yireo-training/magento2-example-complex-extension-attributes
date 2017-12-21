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
<<<<<<< HEAD
        $this->_init('example_complex_extension_attributes', 'id');
=======
        $this->_init('example_simple_extension_attributes', 'id');
>>>>>>> e03cf9c1f5e189342e7ec5cfe29a1fdeb82a0857
    }
}