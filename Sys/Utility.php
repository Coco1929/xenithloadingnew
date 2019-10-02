<?php
/**
 * Galaxy Tools
 *
 * Web tool for Garry's mod servers
 *
 * This content is released under the commercial license
 *
 * Copyright (c) 2019
 *
 * This software is distributed on a paid basis, exclusively on the resource,
 * which is called "Gmodstore" (hereinafter referred to as "platform"). Distribution
 * of this software anywhere other than on the site is prohibited and punishable by
 * copyright law.
 *
 * Persons who have purchased a copy of the software on the site are guaranteed to be
 * entitled to free updates to the software to version 2.0
 *
 * @package    GalaxyTools
 * @author    Gor Mkhitaryan
 * @copyright    Copyright (c) 2019, Gor Mkhitaryan <mkhitaryan.gor@inbox.ru>
 * @since    Version 1.0.0
 */

/**
 *---------------------------------------------------------------
 * Class Utility
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * @package Sys
 */
class Utility
{
    /**
     * @return array
     */
    public static function getConfig()
    {
        return include(BASE_PATH . 'inc/config.php');
    }

    /**
     * @param string $url
     * @return bool
     */
    public static function redirect($url)
    {
        if (!empty($url))
            header('Location: ' . $url);
        else
            return false;

        return true;
    }

    /**
     * @param string $url
     * @param int $delay
     * @return bool
     */
    public static function refresh($url, $delay = 1)
    {
        if (!empty($url))
            echo "<script type='text/javascript'> 

setTimeout('location.replace(\"".$url."\")',".($delay*1000)."); 

</script> ";
        else
            return false;

        return true;
    }


    /**
     * @param array $exceptions
     * @return bool
     */
    public static function handleAuthExceptions($exceptions = [])
    {
        for ($i = 0; $i < count($exceptions); $i++) {
            if ($exceptions[$i] == $_SERVER['REQUEST_URI']) {
                return true;
                break;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function isAuth()
    {
        $auth = new \Sys\Auth();

        return $auth->checkAuthentication();
    }

    /**
     * @param $str
     * @return string
     */
    public static function translate($str)
    {
        $symbols = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
            'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '_', '.', '-');
        $str = strtolower(self::letter_trans($str));
        $str = str_replace(' ', '_', $str);
        $str_result = '';
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $s = $str[$i];
            if (in_array($s, $symbols))
                $str_result .= $s;
        }
        return $str_result;
    }

    /**
     * @param $str
     * @return string
     */
    public static function letter_trans($str)
    {
        $str = strtr($str,
            "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
            "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE");
        return strtr($str, array('е' => "yo", 'х' => "h", 'ц' => "ts", 'ч' => "ch", 'ш' => "sh",
            'щ' => "shch", 'ъ' => '', 'ь' => '', 'ю' => "yu", 'я' => "ya",
            'Е' => "Yo", 'Х' => "H", 'Ц' => "Ts", 'Ч' => "Ch", 'Ш' => "Sh",
            'Щ' => "Shch", 'Ъ' => '', 'Ь' => '', 'Ю' => "Yu", 'Я' => "Ya"));
    }

    /**
     * @param $src
     * @param $dst
     */
    public static function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    self::recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    /**
     * @param $path
     * @return bool
     */
    public static function delete_dir($path)
    {
        clearstatcache();

        if (is_dir($path) === true)
        {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file)
            {
                self::delete_dir(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        }

        else if (is_file($path) === true)
        {
            return unlink($path);
        }

        return false;
    }

    /**
     * @param $path
     */
    public static function truncate($path)
    {
        Utility::delete_dir($path);
        mkdir($path);
    }

    public static function getExtension($file)
    {
        $file = pathinfo($file);

        return $file['extension'];
    }
}