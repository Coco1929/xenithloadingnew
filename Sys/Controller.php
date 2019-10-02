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
 * Class Controller
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * @package Sys
 */
class Controller
{
    /**
     * @var object
     */
    public $model;

    /**
     * @var object
     */
    public $view;

    /**
     * Controller constructor.
     */
    public function __construct()
    {

        $class = new \ReflectionClass(get_called_class());

        $model_format = "App\\Models\\" . $class->getShortName();
        $view_format = "App\\Views\\" . $class->getShortName();

        if(file_exists(BASE_PATH . str_replace('\\',DIRECTORY_SEPARATOR,$model_format) . ".php"))
            $this->model = new $model_format;

        if(file_exists(BASE_PATH . str_replace('\\',DIRECTORY_SEPARATOR,$view_format) . ".php"))
            $this->view  = new $view_format;
    }

    /**
     * @param string $name
     * @param string $argument
     * @return bool
     */
    public function __call($name, $argument) {
        switch($name) {
            case 'lib':
                return $this->getLibrary($argument);
                break;
        }

        return false;
    }

    /**
     * Returns the called library object
     *
     * @param $name
     * @return bool
     */
    private function getLibrary($name) {
        if(file_exists(BASE_PATH . 'app/lib/'.$name.'.php'))  {
            $format = "App\\Lib\\$name";

            return new $format;
        } else {
            return false;
        }
    }
}