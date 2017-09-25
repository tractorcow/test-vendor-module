<?php

namespace TractorCow\TestVendorModule;

use Page;
use SilverStripe\Core\Manifest\ModuleLoader;
use SilverStripe\Versioned\Versioned;

class TestPage extends Page
{
    private static $table_name = 'Test page in a vendor module';

    private static $config_var = 'If you can see this vendor config is not working';

    private static $config_class = 'error';

    public function getImagePath()
    {
        $module = ModuleLoader::getModule('tractorcow/test-vendor-module');
        return $module->getResource('client/images/kitten.jpg')->getURL();
    }

    public function getConfigMessage()
    {
        return static::config()->get('config_var');
    }

    public function getConfigClass()
    {
        return static::config()->get('config_class');
    }

    public function requireDefaultRecords()
    {
        $exists = TestPage::get()->exists();
        if ($exists) {
            return;
        }
        $page = new TestPage();
        $page->Title = 'Vendor Test';
        $page->write();
        $page->copyVersionToStage(Versioned::DRAFT, Versioned::LIVE);
    }
}
