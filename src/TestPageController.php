<?php

namespace TractorCow\TestVendorModule;

use PageController;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\View\Requirements;

class TestPageController extends PageController
{
    protected function init()
    {
        parent::init();

        Requirements::javascript('silverstripe/admin:thirdparty/jquery/jquery.js');
        Requirements::javascript('tractorcow/test-vendor-module:client/js/script.js');
        Requirements::css('tractorcow/test-vendor-module:client/css/style.css');
    }
}
