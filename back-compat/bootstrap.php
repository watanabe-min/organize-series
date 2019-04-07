<?php
/**
 * This file contains all legacy code that is deprecated
 */

use function OrganizeSeries\getVersion;

/**
 * Ths file contains all requires/includes for all files packaged with orgSeries and has all the setup/initialization code for the WordPress plugin.
 *
 * @package Organize Series WordPress Plugin
 * @since 2.2
 * @deprecated $VID:$
 */

/**
 * Nifty function to get the name of the directory orgSeries is installed in.
 */
function orgSeries_dir(){
    if (stristr(__FILE__, '/') )
        $orgdir = explode('/plugins/', dirname(__FILE__));
    else
        $orgdir = explode('\\plugins\\', dirname(__FILE__));
    return str_replace('\\' , '/', end($orgdir)); //takes care of MS slashes
}

$org_dir_name = orgSeries_dir();

/*to get plugin url*/
// Guess the location
$plugin_path = '';
$plugin_url = '';
$plugin_path = plugin_dir_path(__FILE__);
$plugin_url = plugins_url('', __FILE__).'/';
$org_series_loc = $plugin_url;
$os_version = getVersion();

/**
 * This sets the defaults for the constants for orgSeries
 */
define( 'SERIES_PATH_URL', $plugin_url );
define('ORG_SERIES_VERSION', $os_version); //the current version of the plugin
define('SERIES_DIR' , $org_dir_name); //the name of the directory that orgSeries files are located.
define('SERIES_LOC', $org_series_loc); //the uri of the orgSeries files.
define('SERIES_PATH', $plugin_path); //the path of the orgSeries file
//note 'SERIES_QUERY_VAR' is now defined in orgSeries class.
define('SERIES_TOC_QUERYVAR', 'series-toc'); //get/post variable name for querying series-toc from WP
define('SERIES_URL', 'series'); //URL tag to use when querying series archive pages.
define('SERIES_SEARCHURL','search'); //local search URL (from mod_rewrite_rules)
define('SERIES_PART_KEY', '_series_part'); //the default key for the Custom Field that distinguishes what part a post is in the series it belongs to. The underscore makes this hidden on edit post/page screens.
define('SPOST_SHORTTITLE_KEY', '_spost_short_title');
define('SERIES_REWRITERULES','1'); //flag to determine if plugin can change WP rewrite rules.

