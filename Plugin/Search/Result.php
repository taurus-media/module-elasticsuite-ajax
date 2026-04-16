<?php

declare(strict_types=1);

namespace Taurus\ElasticSuiteAjax\Plugin\Search;

use Magento\CatalogSearch\Controller\Result\Index as SearchResult;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\LayoutInterface;

/**
 * Plugin for search result controller.
 */
class Result
{
    /**
     * @param RequestInterface $request
     * @param JsonFactory $jsonFactory
     * @param LayoutInterface $layout
     */
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $jsonFactory,
        private readonly LayoutInterface $layout
    ) {}

    /**
     * Intercept the search result response. If the 'ajax' parameter is present,
     * render only the product list block and collect filter data, returning JSON.
     *
     * @param SearchResult $subject
     * @param callable $proceed
     * @return mixed
     */
    public function aroundExecute(SearchResult $subject, callable $proceed): mixed
    {
        $result = $proceed();

        if (!$this->request->getParam('ajax')) {
            return $result;
        }

        $productListHtml = '';
        $productListBlock = $this->layout->getBlock('search.result');
        if ($productListBlock) {
            $productListHtml = $productListBlock->toHtml();
        }

        $filtersHtml = '';
        $filtersBlock = $this->layout->getBlock('catalogsearch.leftnav');
        if ($filtersBlock) {
            $filtersHtml = $filtersBlock->toHtml();
        }

        $jsonResult = $this->jsonFactory->create();
        $jsonResult->setData([
            'product_list' => $productListHtml,
            'filters' => $filtersHtml,
        ]);

        return $jsonResult;
    }
}
