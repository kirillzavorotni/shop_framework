<?php


namespace core\base\settings;


class Settings
{
    static private $_instance;

    private $routes = [
        'admin' => [
            'name' => 'admin',
            'path' => 'core/admin/controllers',
            'hrUrl' => false
        ],
        'settings' => [
            'path' => 'core/base/settings'
        ],
        'plugins' => [
            'path' => 'core/plugins',
            'hrUrl' => false
        ],
        'user' => [
            'path' => 'core/user/controllers',
            'hrUrl' => true,
            'routes' => ["route"]
        ],
        'default' => [
            'controller' => 'IndexController',
            'inputMethod' => 'inputData',
            'outputMethod' => 'outputData'
        ]
    ];

    private $templateArr = [
        'text' => ['name', 'phone', 'address'],
        'textarea' => ['content', 'keyword']
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
        return self::$_instance = new self;
    }

    static public function get($property)
    {
        return self::instance()->$property;
    }

    public function clueProperties($class)
    {

        $commonProperties = [];

        foreach ($this as $basePropertyName => $value) {
            $additionalProperty = $class::get($basePropertyName);

            if (is_array($additionalProperty) && is_array($value)) {
                $commonProperties[$basePropertyName] = $this->arrayMergeRecursive($this->$basePropertyName, $additionalProperty);
            }

            if (!$additionalProperty) {
                $commonProperties[$basePropertyName] = $this->$basePropertyName;
            }
        }

        return $commonProperties;
    }

    public function arrayMergeRecursive()
    {
        $allSettings = func_get_args();
        $baseSettings = array_shift($allSettings);
        $additionalArray = $allSettings;

        foreach ($additionalArray as $arrayItem) {
            foreach ($arrayItem as $name => $value) {
                if (is_array($value) && is_array($baseSettings[$name])) {
                    $baseSettings[$name] = $this->arrayMergeRecursive($baseSettings[$name], $value);
                } else {
                    if (is_int($name)) {
                        if (!in_array($value, $baseSettings)) {
                            array_push($baseSettings, $value);
                            continue;
                        }
                    }
                    $baseSettings[$name] = $value;
                }
            }
        }

        return $baseSettings;
    }
}