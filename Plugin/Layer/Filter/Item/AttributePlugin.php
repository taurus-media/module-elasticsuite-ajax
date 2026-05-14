<?php
/**
 * Taurus_ElasticSuiteAjax module
 *
 * @category  Taurus
 * @package   Taurus_ElasticSuiteAjax
 * @author    Taurus
 */

namespace Taurus\ElasticSuiteAjax\Plugin\Layer\Filter\Item;

use Smile\ElasticsuiteCatalog\Model\Layer\Filter\Item\Attribute;
use Taurus\ElasticSuiteAjax\Helper\UrlHelper;

/**
 * Plugin for Attribute item filter.
 */
class AttributePlugin
{
    /**
     * Remove ajax parameter from filter item URL.
     *
     * @param Attribute $subject Filter item.
     * @param string    $result  Filter item URL.
     *
     * @return string
     */
    public function afterGetUrl(Attribute $subject, $result)
    {
        return UrlHelper::removeAjaxParam($result);
    }

    /**
     * Remove ajax parameter from filter item remove URL.
     *
     * @param Attribute $subject Filter item.
     * @param string    $result Filter item remove URL.
     *
     * @return string
     */
    public function afterGetRemoveUrl(Attribute $subject, $result)
    {
        return UrlHelper::removeAjaxParam($result);
    }
}
