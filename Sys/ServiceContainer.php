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
 * Class ServiceContainer
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * Class ServiceContainer
 * @package Sys
 */
class ServiceContainer
{
    /**
     * @var array
     */
    private static $storage = [];

    /**
     * Associates the objects in $objects value with $obje
     *
     * @param array $objects
     * @throws \Exception
     */
    public static function store($objects = [])
    {
        if(!empty($objects)){
            foreach($objects as $key => $value){
                if(is_string($key) && is_object($value))
                    self::$storage[$key] = $value;
            }
        } else {
            throw new \Exception("Invalid arguments specified in 'registerHooks' method");
        }
    }

    /**
     * Returns the object which associated with $alias
     *
     * @param $alias
     * @return bool|mixed
     * @throws \Exception
     */
    public static function extract($alias)
    {
        if(self::exists($alias)){
            return self::$storage[$alias];
        } else {
            throw new \Exception("Attempt to extract nonexistent object");
        }
    }

    /**
     * Returns true if there is an object associated with $alias, false if not.
     *
     * @param $alias
     * @return bool
     */
    public static function exists($alias)
    {
        if(isset(self::$storage[$alias]))
            return true;
        else
            return false;
    }

    /**
     * @return array
     */
    public static function getStorage()
    {
        return self::$storage;
    }
}