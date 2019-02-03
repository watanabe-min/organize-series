<?php
namespace OrganizeSeriesTests\bootstrap;

class CoreLoader
{
    public function init()
    {
        $this->setConstants();
        $this->preLoadWPandEE();
        $this->loadWP();
        $this->onShutdown();
    }
    protected function setConstants()
    {
        if (! defined('OS_TESTS_DIR')) {
            if (getenv('OS_TESTS_DIR')) {
                define('OS_TESTS_DIR', getenv('OS_TESTS_DIR'));
                define('OS_PLUGIN_DIR', dirname(dirname(OS_TESTS_DIR)) . '/');
            } else {
                define('OS_PLUGIN_DIR', dirname(dirname(__DIR__)) . '/');
                define('OS_TESTS_DIR', OS_PLUGIN_DIR . 'tests/');
            }
            $_tests_dir = getenv('WP_TESTS_DIR');
            if (! $_tests_dir) {
                $_tests_dir = '/tmp/wordpress-tests-lib';
            }
            if (file_exists($_tests_dir . '/includes/functions.php')) {
                define('WP_TESTS_DIR', $_tests_dir);
            } else {
                define(
                    'WP_TESTS_DIR',
                    dirname(
                        dirname(
                            dirname(
                                dirname(
                                    dirname(
                                        dirname(
                                            __DIR__
                                        )
                                    )
                                )
                            )
                        )
                    ) . '/tests/phpunit'
                );
            }
        }
    }
    protected function preLoadWPandEE()
    {
        //if WordPress test suite isn't found then we can't do anything.
        if (! is_readable(WP_TESTS_DIR . '/includes/functions.php')) {
            die("The WordPress PHPUnit test suite could not be found.\n");
        }
        require_once WP_TESTS_DIR . '/includes/functions.php';
        //set filter for bootstrapping Organize Series which needs to happen BEFORE loading WP.
        tests_add_filter('muplugins_loaded', array($this, 'setupAndLoadEE'));
    }
    protected function loadWP()
    {
        require WP_TESTS_DIR . '/includes/bootstrap.php';
    }
    public function setupAndLoadEE()
    {
        // Bootstrap Organize Series
        require OS_PLUGIN_DIR . 'orgSeries.php';
        //save wpdb queries in case we want to know what queries ran during a test
        if (! defined('SAVEQUERIES')) {
            define('SAVEQUERIES', true);
        }
    }
    protected function onShutdown()
    {
        // @todo this should be unnecessary after the refactor.
        // global $wpdb;
        // //nuke all OS data once the tests are done, so that it doesn't carry over to the next time we run tests
        // register_shutdown_function(
        //     function () use ($wpdb) {
        //         $table_name = $wpdb->prefix . "orgseriesicons";
        //         $drop_query = "DROP TABLE ". $table_name;
        //         $wpdb->query( $drop_query );
        //     }
        // );
    }
}
