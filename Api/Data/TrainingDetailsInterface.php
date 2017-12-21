<?php
declare(strict_types=1);

namespace Yireo\ExampleComplexExtensionAttributes\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface TrainingDetailsInterface
 *
 * @package Yireo\ExampleComplexExtensionAttributes\Api\Data
 */
interface TrainingDetailsInterface extends ExtensibleDataInterface
{
    /**
     * @return string
     */
    public function getTrainingDateStart() : string;

    /**
     * @param string $trainingDateStart
     *
     * @return mixed
     */
    public function setTrainingDateStart(string $trainingDateStart);

    /**
     * @return string
     */
    public function getTrainingDateEnd() : string;

    /**
     * @param string $trainingDateEnd
     *
     * @return mixed
     */
    public function setTrainingDateEnd(string $trainingDateEnd);
}