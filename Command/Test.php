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
 * Class Test
 *
 * @package Yireo\ExampleComplexExtensionAttributes\Command
 */
class Test extends Command
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
     * @var State
     */
    private $appState;

    /**
     * Test constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param State $appState
     * @param null $name
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        State $appState,
        $name = null
    ) {
        parent::__construct($name);
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->appState = $appState;
    }

    /**
     * Configure this command
     */
    protected function configure()
    {
        $this->setName('example_complex_extension_attributes:test');
        $this->setDescription('Test whether example extension attributes are working.');
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Load and save a product
        $product = $this->loadSomeProduct();
        $this->setTrainingDates($product);
        $this->saveProduct($product);

        // Load the same product twice but now from the database
        $newProduct = $this->productRepository->get($product->getSku());

        // Compare the result
        $originalTrainingDetails = $product->getExtensionAttributes()->getTrainingDetails();
        $originalTrainingDateStart = $originalTrainingDetails->getTrainingDateStart();
        $newTrainingDetails = $newProduct->getExtensionAttributes()->getTrainingDetails();
        $newTrainingDateStart = $newTrainingDetails->getTrainingDateStart();
        $output->writeln((string)$originalTrainingDateStart . ' = ' . (string)$newTrainingDateStart);
    }

    /**
     * @return ProductInterface
     */
    private function loadSomeProduct() : ProductInterface
    {
        $productSku = $this->getFirstProductSkuFromCatalog();
        $product = $this->productRepository->get($productSku);
        return $product;
    }

    /**
     * @param ProductInterface $product
     */
    private function saveProduct(ProductInterface $product)
    {
        $this->appState->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);
        $this->productRepository->save($product);
    }

    /**
     * @param ProductInterface $product
     */
    private function setTrainingDates(ProductInterface &$product)
    {
        $extensionAttributes = $product->getExtensionAttributes();
        if (empty($extensionAttributes)) {
            throw new \RuntimeException('Unable to load extension attributes');
        }

        $trainingDetails = $extensionAttributes->getTrainingDetails();
        if (empty($trainingDetails)) {
            throw new \RuntimeException('Unable to load training details');
        }

        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('tomorrow'));

        $trainingDetails->setTrainingDateStart($startDate);
        $trainingDetails->setTrainingDateEnd($endDate);
    }

    /**
     * @return string
     */
    private function getFirstProductSkuFromCatalog()
    {
        $this->searchCriteriaBuilder->setPageSize(1);
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchResult = $this->productRepository->getList($searchCriteria);
        $products = $searchResult->getItems();
        $product = array_pop($products);

        return $product->getSku();
    }
}