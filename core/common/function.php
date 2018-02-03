<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/30
 * Time: 23:02
 */

/**
 * @param $var
 * echo $var
 */
function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } else if (is_null($var)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
    }
}

/**
 * @param $name string 对应变量的名称
 * @param bool $default 默认返回值
 * @param bool $filter 过滤类型
 * @return string|bool
 */
function post($name, $default = false, $filter = false)
{
    if (isset($_POST[$name])) {
        if ($filter) {
            switch ($filter) {
                case 'int':
                    if (is_numeric($_POST[$name])) {
                        return $_POST[$name];
                    } else {
                        return $default;
                    }
                    break;
                default:
                    break;
            }
        } else {
            return $_POST[$name];
        }
    } else {
        return $default;
    }
    return false;
}

/**
 * @param $name string 对应变量的名称
 * @param bool $default 默认返回值
 * @param bool $filter 过滤类型
 * @return string|bool
 */
function get($name, $default = false, $filter = false)
{
    if (isset($_GET[$name])) {
        if ($filter) {
            switch ($filter) {
                case 'int':
                    if (is_numeric($_GET[$name])) {
                        return $_GET[$name];
                    } else {
                        return $default;
                    }
                    break;
                default:
                    break;
            }
        } else {
            return $_GET[$name];
        }
    } else {
        return $default;
    }
    return false;
}

/**
 * @param $url
 */
function jump($url)
{
    header('Location:' . $url);
    exit();
}