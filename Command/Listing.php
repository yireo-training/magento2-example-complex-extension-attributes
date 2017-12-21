<?php
declare(strict_types=1);

namespace Yireo\ExampleComplexExtensionAttributes\Command;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\State;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Listing
 *
 * @package Yireo\ExampleComplexExtensionAttributes\Command
 */
class Listing extends Command
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * Test constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param null $name
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        $name = null
    ) {
        parent::__construct($name);
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Configure this command
     */
    protected function configure()
    {
        $this->setName('example_complex_extension_attributes:listing');
        $this->setDescription('List example extension attributes.');
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $products = $this->getProductListing();
        foreach ($products as $product) {
            $trainingDetails = $product->getExtensionAttributes()->getTrainingDetails();
            $trainingDateStart = ($trainingDetails) ? $trainingDetails->getTrainingDateStart() : '-';

            $output->writeln($product->getId().': '.$trainingDateStart);
        }
    }

    /**
     * @return ProductInterface[]
     */
    private function getProductListing() : array
    {
        $this->searchCriteriaBuilder->setPageSize(2);
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchResult = $this->productRepository->getList($searchCriteria);
        $products = $searchResult->getItems();

        return $products;
    }
}