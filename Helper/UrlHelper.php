<?php
/**
 * Taurus_ElasticSuiteAjax module
 *
 * @category  Taurus
 * @package   Taurus_ElasticSuiteAjax
 * @author    Taurus
 */

namespace Taurus\ElasticSuiteAjax\Helper;

/**
 * URL helper.
 */
class UrlHelper
{
    /**
     * Remove ajax parameter from URL string.
     *
     * @param string $url Filter item URL.
     *
     * @return string
     */
    public static function removeAjaxParam($url)
    {
        $url = html_entity_decode($url);

        $url = preg_replace('/([?&])ajax=1(&)?/', '$1', $url);
        $url = rtrim(str_replace('?&', '?', $url), '?&');

        return $url;
    }
}
