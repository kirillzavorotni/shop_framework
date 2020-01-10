<?php

define('VG_ACCESS', true);

header('Content-type:text/html;charset=utf-8');

session_start();

require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';

use core\base\exceptions\RouteException;
use core\base\controllers\RouteController;

use core\base\settings\Settings;
use core\base\settings\ShopSettings;

try {

    RouteController::getInstance();

} catch (RouteException $e) {
    exit($e->getMessage());
}

//$base = [
//    'user' => 'admin',
//    'some2' => [
//        'e3_1' => 'e3_1',
//        'e3_2' => 'e3_2',
//        'e4_4' => ["abc", "def"]
//    ]
//];
//
//$additional = [
//    'user' => 'root',
//    'some2' => [
//        'e3_1' => 'e3_1',
//        'e3_2' => 'e3_3',
//        'e4_4' => ["abc", "def" => ["ppp", "jjj"]]
//    ]
//];
//
//$additional2 = [
//    'some2' => [
//        'e3_1' => 'e3_1',
//        'e3_3' => 'e3_3',
//        'e4_4' => ["abc", "def" => [
//            'eee' => 'aaa'
//        ]]
//    ]
//];
//
//$additional3 = [
//    'some2' => "qwerty"
//];
//
////var_dump(clueProperties($base, $additional));
//
//$s = clueProperties($base, $additional, $additional2, $additional3);
//$s1 = null;
//
//function clueProperties()
//{
//    $arguments = func_get_args();
//    $baseSettings = array_shift($arguments);
//
//    foreach ($arguments as $setting) {
//        foreach ($setting as $name => $val) {
//            if (is_array($val) && is_array($baseSettings[$name])) {
//                $baseSettings[$name] = arrayMergeRecursive($baseSettings[$name], $val);
//                continue;
//            }
//
//            $baseSettings[$name] = $val;
//        }
//    }
//
//    return $baseSettings;
//}
//
//function arrayMergeRecursive($arr1, $arr2)
//{
//    $baseSettings = $arr1; // arr
//
//    foreach ($arr2 as $key => $val) {
//        if (isset($baseSettings[$key]) && is_array($val) && is_array($baseSettings[$key])) {
//            $baseSettings[$key] = arrayMergeRecursive($baseSettings[$key], $val);
//            continue;
//        } else {
//            if (is_int($key)) {
//                if (!in_array($val, $baseSettings)) {
//                    $baseSettings[] = $val;
//                    continue;
//                }
//            } else {
//                $baseSettings[$key] = $val;
//            }
//        }
//    }
//    return $baseSettings;
//}