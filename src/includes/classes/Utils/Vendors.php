<?php
/**
 * Vendor utils.
 *
 * @author @jaswsinc
 * @copyright WP Sharks™
 */
declare (strict_types = 1);
namespace WebSharks\WpSharks\WooCommerceKBArticles\Classes\Utils;

use WebSharks\WpSharks\WooCommerceKBArticles\Classes;
use WebSharks\WpSharks\WooCommerceKBArticles\Interfaces;
use WebSharks\WpSharks\WooCommerceKBArticles\Traits;
#
use WebSharks\WpSharks\WooCommerceKBArticles\Classes\AppFacades as a;
use WebSharks\WpSharks\WooCommerceKBArticles\Classes\SCoreFacades as s;
use WebSharks\WpSharks\WooCommerceKBArticles\Classes\CoreFacades as c;
#
use WebSharks\WpSharks\Core\Classes as SCoreClasses;
use WebSharks\WpSharks\Core\Interfaces as SCoreInterfaces;
use WebSharks\WpSharks\Core\Traits as SCoreTraits;
#
use WebSharks\Core\WpSharksCore\Classes as CoreClasses;
use WebSharks\Core\WpSharksCore\Classes\Core\Base\Exception;
use WebSharks\Core\WpSharksCore\Interfaces as CoreInterfaces;
use WebSharks\Core\WpSharksCore\Traits as CoreTraits;
#
use function assert as debug;
use function get_defined_vars as vars;

/**
 * Vendor utils.
 *
 * @since 160731.38548 Initial release.
 */
class Vendors extends SCoreClasses\SCore\Base\Core
{
    /**
     * On default caps.
     *
     * @since 160731.38548 Initial release.
     *
     * @param array $caps Default capabilities.
     *
     * @return array Default capabilities.
     */
    public function onDefaultCaps(array $caps): array
    {
        return array_merge($caps, array_fill_keys(a::postTypeVendorCaps(), true));
    }

    /**
     * On `pre_get_posts` hook.
     *
     * @since 160731.38548 Initial release.
     *
     * @param \WP_Query $WP_Query The query.
     */
    public function onPreGetPosts(\WP_Query $WP_Query)
    {
        if (!$this->Wp->is_admin) {
            return; // Nothing to do.
        } elseif ($WP_Query->get('post_type') !== 'kb_article') {
            return; // Not applicable.
        }
        // @TODO Filter this query for product vendor compat.
    }
}
