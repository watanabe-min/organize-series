<?php
namespace OrganizeSeriestTests\testcases;

use OrganizeSeries\application\Root;
use OrganizeSeries\domain\Meta;
use \WP_UnitTestCase;

/**
 * BootStrap
 * Tests that OrganizeSeries loads as expected.
 *
 * @package OrganizeSeriestTests\testcases
 * @author  Darren Ethier
 * @since   $VID:$
 */
class BootStrap extends WP_UnitTestCase {

    /**
     * Assertions for
     */
    public function testConstantsDefined()
    {
        $this->assertTrue(defined('SERIES_TOC_QUERYVAR'));
        $this->assertEquals('series-toc', SERIES_TOC_QUERYVAR);
    }

    public function testMetaExists()
    {
        $this->assertTrue(Root::coreMeta() instanceof Meta);
    }
}
