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
        $result = str_replace(['ajax=1&', 'ajax=1'], '', $result);
        $result = rtrim($result, '?');

        return $result;
    }
}
