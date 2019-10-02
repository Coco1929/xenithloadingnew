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
 * Class Boot
 *---------------------------------------------------------------
 */

namespace Sys;

use App\Hooks\OnRoute;
use Sys\Database\Manager;

/**
 * @package Sys
 */
class Boot
{
    public static function initializeApplication()
    {
        $config = Utility::getConfig();

        if(empty($config)) {
            Utility::redirect('/install');
            die();
        } else {
            Utility::delete_dir(BASE_PATH . 'install');
        }

        try {
            Hook::registerHooks([
                'OnRoute' => new OnRoute()
            ]);

            ServiceContainer::store([
                'Database' => new Manager()
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $router = new Routing();
        $router->route();
    }
}