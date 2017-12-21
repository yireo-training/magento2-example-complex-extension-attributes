<?php
declare(strict_types=1);

namespace Yireo\ExampleComplexExtensionAttributes\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Yireo\ExampleComplexExtensionAttributes\Api\Data\TrainingDetailsInterface;
use Yireo\ExampleComplexExtensionAttributes\Model\ResourceModel\ExampleAttributes as ResourceModel;

/**
 * Class ExampleAttributes
 *
 * @package Yireo\ExampleComplexExtensionAttributes\Model\ResourceModel
 */
class ExampleAttributes extends AbstractExtensibleModel implements TrainingDetailsInterface
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int
     */
    public function getProductId() : int
    {
        return (int)$this->getData('product_id');
    }

    /**
     * @param int $productId
     *
     * @return $this
     */
    public function setProductId(int $productId)
    {
        return $this->setData('product_id', $productId);
    }

    /**
     * @return string
     */
    public function getTrainingDateStart() : string
    {
        return (string)$this->getData('training_date_start');
    }

    /**
     * @param string $trainingDateStart
     *
     * @return $this
     */
    public function setTrainingDateStart(string $trainingDateStart)
    {
        return $this->setData('training_date_start', $trainingDateStart);
    }

    /**
     * @return string
     */
    public function getTrainingDateEnd() : string
    {
        return (string)$this->getData('training_date_end');
    }

    /**
     * @param string $trainingDateEnd
     *
     * @return $this
     */
    public function setTrainingDateEnd(string $trainingDateEnd)
    {
        return $this->setData('training_date_end', $trainingDateEnd);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Magento\Framework\Api\ExtensionAttributesInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     *
     * @param TrainingDetailsInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        TrainingDetailsInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}