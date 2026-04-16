<?php

declare(strict_types=1);

namespace Taurus\ElasticSuiteAjax\Plugin\Category;

use Magento\Catalog\Controller\Category\View as CategoryView;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Result\Page;
use Smile\ElasticsuiteCatalog\Block\Navigation\Renderer\Attribute as AttributeRenderer;
use Smile\ElasticsuiteCatalog\Block\Navigation\Renderer\Slider as SliderRenderer;

class View
{
    /**
     * @param RequestInterface $request
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $jsonFactory
    ) {}

    /**
     * Intercept the category view response. If the 'ajax' parameter is present,
     * render only the product list block and collect filter data, returning JSON.
     */
    public function afterExecute(CategoryView $subject, mixed $result): mixed
    {
        if (!($result instanceof Page) || !$this->request->getParam('ajax')) {
            return $result;
        }

        $layout = $result->getLayout();

        $productListHtml = '';
        $productListBlock = $layout->getBlock('category.products');
        if ($productListBlock) {
            $productListHtml = $productListBlock->toHtml();
        }

        $filtersHtml = '';
        $filtersBlock = $layout->getBlock('catalog.leftnav');
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
