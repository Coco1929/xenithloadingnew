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
 * Class Main
 *---------------------------------------------------------------
 */

namespace App\Models;

use Sys\Database\Manager;

/**
 * @package App\Models
 */
class Main extends Manager
{
    /**
     * Main constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getCurrentThemeData()
    {
        $query = $this->query("SELECT * FROM `gt_settings` WHERE 1");

        return $query->fetch();
    }

    public function getCurrentAdvancedTheme()
    {
        return $this->query('SELECT * FROM `gt_themes` WHERE `advanced` = 1 AND `active` = 1')->fetch();
    }

    /**
     * @param $alias
     * @return mixed
     */
    public function getCurrentStyleName($alias)
    {
        return $this->query('SELECT * FROM `gt_loading_styles` WHERE `alias` = :alias', [':alias' => $alias])->fetch();
    }

    public function ifAdvanced()
    {
        return (!empty($this->query("SELECT * FROM `gt_themes` WHERE `advanced` = 1 AND `active` = 1")->fetch()));
    }
}