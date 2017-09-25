<?php

namespace TractorCow\TestVendorModule;

use Page;
use SilverStripe\Core\Manifest\ModuleLoader;

class TestPage extends Page
{
    private static $table_name = 'Test page in a vendor module';

    public function getImagePath()
    {
        $module = ModuleLoader::getModule('tractorcow/test-vendor-module');
        return $module->getResource('client/images/kitten.jpg')->getURL();
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
        $page->copyVersionToStage(static::DRAFT, static::LIVE);
    }
}
