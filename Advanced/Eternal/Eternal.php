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

namespace Advanced\Eternal;

use App\Controllers\Admin;
use Sys\AdvancedThemeInterface;
use Sys\Templater;
use Sys\Utility;

/**
 * @package Advanced\Eternal
 */
class Eternal implements AdvancedThemeInterface
{
    /**
     * @var Templater
     */
    private $templater;

    /**
     * @var string
     */
    private $tplPath = BASE_PATH . 'Advanced/Eternal/templates/';

    /**
     * Eternal constructor.
     */
    public function __construct()
    {
        $this->templater = new Templater();
    }

    /**
     * This method renders settings block of this theme in admin panel
     */
    public function renderSettings()
    {
        $settings = $this->parseJson('/Advanced/Eternal/settings.json');

        echo $this->templater->abs_render($this->tplPath . 'backend/settings', [
            'settings' => $settings
        ]);
    }


    public function renderMainPage()
    {
        $adminModel = new \App\Models\Admin();

        $settings  = $this->parseJson('/Advanced/Eternal/settings.json');

        $themeData = $adminModel->getCurrentThemeData();

        echo $this->templater->abs_render($this->tplPath . 'frontend/main', [
            'theme' => $themeData,
            'desc'  => $settings["header"]
        ]);
    }

    /**
     * @param $file
     * @return mixed
     */
    private function parseJson($file)
    {
        return json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . $file), true);
    }

    /**
     * @param $file
     * @param $array
     */
    private function updateJson($file, $array)
    {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . $file, json_encode($array));
    }


    /**
     * @throws \Exception
     */
    public function updateSettings()
    {
        $this->updateJson('/Advanced/Eternal/settings.json', [
            "header" => $_POST['header']
        ]);

        $adminController = new Admin();

        Utility::refresh('/admin');
        $adminController->index('Header updated!');
    }
}