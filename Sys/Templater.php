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
 * Class Templater
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * @package Sys
 */
class Templater
{
    /**
     * @var string
     */
    private $path = BASE_PATH . "inc/tmpl/";

    /**
     * Renders template from inc/tmpl folder
     *
     * @param $tplPath
     * @param array $vars
     * @return string
     */
    public function render($tplPath, $vars = array())
    {
        if (!is_file($this->path . $tplPath . ".php"))
            return "Template error!";
        extract($vars);
        ob_start();
        include($this->path . $tplPath . ".php");

        return ob_get_clean();
    }

    /**
     * Renders template without default path
     * @param $tplPath
     * @param array $vars
     * @return string
     */
    public function abs_render($tplPath, $vars = array())
    {
        if (!is_file($tplPath . ".php"))
            return "Template error!";
        extract($vars);
        ob_start();
        include($tplPath . ".php");

        return ob_get_clean();
    }
}