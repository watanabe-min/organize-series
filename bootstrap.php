<?php
use OrganizeSeries\application\Root;
use OrganizeSeries\domain\services\CoreBootstrap;
use function OrganizeSeries\getVersion;

//initialize Meta (path registration etc)
Root::initialize(__FILE__, getVersion());
//register routes
Root::container()->make(CoreBootstrap::class);
//this is the hook that all Organize Series Extensions should hook in on.
do_action('AHOS__bootstrapped');
