<?php


namespace core\base\settings;


class ShopSettings
{
    static private $_instance;
    public $baseSettings;

    private $routes = [
        'admin' => [
            'name' => 'zzz',
            'blablabla' => 'qqqqqqq',
        ]
    ];

    private $templateArr = [
        'text' => ['price', 'short'],
        'textarea' => ['good_content']
    ];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    static public function instance()
    {

        if (self::$_instance instanceof self) {
            return self::$_instance;
        }

        self::$_instance = new self;
        self::$_instance->baseSettings = Settings::instance();

        $baseProperties = self::$_instance->baseSettings->clueProperties(get_class());
        self::$_instance->setProperty($baseProperties);

        return self::$_instance;

    }

    static public function get($property)
    {
        return self::$_instance->$property;
    }

    protected function setProperty($properties)
    {
        if ($properties) {
            foreach ($properties as $name => $value) {
                $this->$name = $value;
            }
        }
    }
}