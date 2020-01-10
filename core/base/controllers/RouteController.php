<?php


namespace core\base\controllers;
use core\base\settings\Settings;
use core\base\settings\ShopSettings;


class RouteController
{
    static private $_instance;
    public $test = 'test';

    private function __construct()
    {

        $settings = Settings::instance();
        $shopSettings = ShopSettings::instance();

        exit();

    }

    static public function getInstance()
    {
        if (self::$_instance instanceof self) {
            return self::$_instance;
        }

        return self::$_instance = new self;
    }
}