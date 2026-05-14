<?php
/**
 * Taurus_ElasticSuiteAjax module
 *
 * @category  Taurus
 * @package   Taurus_ElasticSuiteAjax
 * @author    Taurus
 */

namespace Taurus\ElasticSuiteAjax\Plugin\LayeredNavigation\Block\Navigation;

use Magento\LayeredNavigation\Block\Navigation\State;
use Taurus\ElasticSuiteAjax\Helper\UrlHelper;

/**
 * Plugin for Layered Navigation State block.
 */
class StatePlugin
{
    /**
     * Remove ajax parameter from "Clear All" URL.
     *
     * @param State  $subject State block.
     * @param string $result  Clear URL.
     *
     * @return string
     */
    public function afterGetClearUrl(State $subject, $result)
    {
        return UrlHelper::removeAjaxParam($result);
    }
}
