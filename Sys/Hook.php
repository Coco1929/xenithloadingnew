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
 * @package      GalaxyTools
 * @author       Gor Mkhitaryan
 * @copyright    Copyright (c) 2019, Gor Mkhitaryan <mkhitaryan.gor@inbox.ru>
 * @since        Version 1.0.0
 */

/**
 *---------------------------------------------------------------
 * Class Hook
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * @package Sys
 */
class Hook
{
    /**
     * @var array
     */
    private static $hooks = [];

    /**
     * Calling hook
     *
     * @param string $key
     * @param array $args
     * @return mixed
     * @throws \Exception
     */
    public static function call($key, $args = [])
    {
        if (file_exists(BASE_PATH . 'App/hooks/' . $key . '.php')) {
            if (is_string($key)) {
                if (empty($args)) {
                    call_user_func([new self::$hooks[$key], 'handle']);

                    return true;
                } else {
                    call_user_func_array([new self::$hooks[$key], 'handle'], $args);

                    return true;
                }
            } else {
                throw new \Exception("Invalid arguments specified in 'call' method");
            }
        } else {
            return false;
        }
    }

    /**
     * Registering all objects of hooks
     *
     * @param array $objects
     * @throws \Exception
     */
    public static function registerHooks($objects = [])
    {
        if (!empty($objects)) {
            foreach ($objects as $key => $value) {
                if (is_string($key) && is_object($value))
                    self::$hooks[$key] = $value;
            }
        } else {
            throw new \Exception("Invalid arguments specified in 'registerHooks' method");
        }
    }
}