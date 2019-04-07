<?php
/*
Plugin Name: Organize Series
Plugin URI: http://organizeseries.com
Version: 2.5.13.rc.000
Description: This plugin adds a number of features to wordpress that enable you to easily write and organize a series of posts and display the series dynamically in your blog. You can associate "icons" or "logos" with the various series.
Author: Darren Ethier
Author URI: http://www.unfoldingneurons.com
Text Domain: organize-series
*/

### INSTALLATION/USAGE INSTRUCTIONS ###
//	Installation and/or usage instructions for the Organize Series Plugin
//	can be found at http://organizeseries.com
$os_version = '2.5.13.rc.000';

######################################

######################################
// Organize Series Wordpress Plugin
//
//"Organize Series Plugin" is copyright (c) 2007-2012 Darren Ethier. This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
//
//It goes without saying that this is a plugin for WordPress and I have no interest in developing it for other platforms so please, don't ask ;).
//

######################################
/** Changelog
 * Visit @link http://wordpress.org/extend/plugins/organize-series/changelog/ for the list of all the changes in Organize Series.
 *
 */


/**
 * Ths file contains all requires/includes for all files packaged with orgSeries and has all the setup/initialization code for the WordPress plugin.
 *
 * @package Organize Series WordPress Plugin
 * @since 2.2
 */

}



// composer autoload
require __DIR__ . '/vendor/autoload.php';
// new bootstrapping, eventually this will replace all of the above.
require plugin_dir_path(__FILE__) . 'bootstrap.php';
