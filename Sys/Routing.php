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
 * Class Routing
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * @package Sys
 */
class Routing
{
    public function route()
    {
        try {
            Hook::call('BeforeRoute');
        } catch (\Exception $e) {
        }

        $config = Utility::getConfig();

        $uri = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($uri[1])) {
            $controller = $uri[1];
        } else {
            $controller = $config['default_controller'];
        }

        if (!empty($uri[2])) {
            $method = $uri[2];
        } else {
            $method = 'index';
        }
        
        $controller = ucfirst($controller);
        
        $format = 'App\Controllers\\' . $controller;
        
        if (file_exists(BASE_PATH . 'App'.DIRECTORY_SEPARATOR.'Controllers'. DIRECTORY_SEPARATOR . $controller . '.php')) {
            if (class_exists($format)) {
                if (method_exists($format, $method) || method_exists($format, '__call')) {
                    try {
                        Hook::call('OnRoute');
                    } catch (\Exception $e) {
                        $e->getMessage();
                    }

                    $_obj = new $format;
                    call_user_func_array([$_obj, $method], array_slice($uri, 3));
                } else {
                    die('Method <b>' . $method . '</b> does not exists');
                }
            } else {
                die('Class <b>' . $controller . '</b> does not exists');
            }
        } else {
            die('File <b>' . $controller . '.php</b> does not exists');
        }
    }
}