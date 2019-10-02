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
 * Class AdvancedTheme
 *---------------------------------------------------------------
 */

namespace App\Controllers;

/**
 * @package App\Controllers
 */
class AdvancedTheme
{
    /**
     * @param $name
     * @param null $arg
     */
    public function __call($name, $arg = null)
    {
        $adminModel = new \App\Models\Admin();

        $currentAdvancedTheme = $adminModel->getCurrentAdvancedTheme();
        $currentAdvancedThemeObjectFormat = "Advanced\\" . $currentAdvancedTheme['name'] . "\\" . $currentAdvancedTheme['name'];

        if(class_exists($currentAdvancedThemeObjectFormat)) {
            $currentAdvancedThemeObject = new $currentAdvancedThemeObjectFormat;
            $currentAdvancedThemeObject->$name($arg);
        }
    }
}