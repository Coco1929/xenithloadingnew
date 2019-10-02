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
 * Class motion
 *---------------------------------------------------------------
 */

namespace Advanced\Motion;

use App\Controllers\Admin;
use Sys\AdvancedThemeInterface;
use Sys\Templater;
use Sys\Utility;

/**
 * @package Advanced\Motion
 */
class Motion implements AdvancedThemeInterface
{
    /**
     * @var Templater
     */
    private $templater;

    /**
     * @var string
     */
    private $tplPath = BASE_PATH . 'Advanced/Motion/templates/';

    /**
     * Motion constructor.
     */
    public function __construct()
    {
        $this->templater = new Templater();
    }

    /**
     * @return void
     */
    public function renderSettings()
    {
        $settings = $this->parseJson('/Advanced/Motion/settings.json');

        echo $this->templater->abs_render($this->tplPath . 'backend/settings', $settings);
    }

    /**
     * @return void
     */
    public function renderMainPage()
    {
        $main = new \App\Models\Main();
        $style = $main->getCurrentThemeData();
        $style['advanced'] = $main->ifAdvanced();
        $settings = $this->parseJson('/Advanced/Motion/settings.json');

        $settings['style'] = $this->templater->abs_render($_SERVER['DOCUMENT_ROOT'] . '/styles/'.$main->getCurrentStyleName($style['style'])['name'].'/'.strtolower($main->getCurrentStyleName($style['style'])['name']), $style);
        $settings['theme'] = $style;
        echo $this->templater->abs_render($this->tplPath . 'frontend/main', $settings);
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
    public function setVideo()
    {
        $adminController = new Admin();
        $settings = $this->parseJson('/Advanced/Motion/settings.json');

        if(isset($_FILES['videofile'])) {
            move_uploaded_file
            (
                $_FILES['videofile']["tmp_name"],
                BASE_PATH . "pub/motion/" . Utility::translate($_FILES["videofile"]["name"])
            );

            $video = BASE_PATH . "pub/motion/" . Utility::translate($_FILES["videofile"]["name"]);
        } else {
            $video = $_POST['url'];
        }

        $this->updateJson('/Advanced/Motion/settings.json', [
            'video' => $video,
            'heading' => $settings['heading'],
            'overlay' => $settings['overlay']
        ]);

        Utility::refresh('/admin');
        $adminController->index('Video updated!');
    }

    /**
     * @throws \Exception
     */
    public function setHeading()
    {
        $adminController = new Admin();
        $settings = $this->parseJson('/Advanced/Motion/settings.json');

        $this->updateJson('/Advanced/Motion/settings.json', [
            'video' => $settings['video'],
            'heading' => $_POST['heading'],
            'overlay' => $settings['overlay']
        ]);

        Utility::refresh('/admin');
        $adminController->index('Header information updated!');
    }

    /**
     * @throws \Exception
     */
    public function setOverlay()
    {
        $adminController = new Admin();
        $settings = $this->parseJson('/Advanced/Motion/settings.json');

        $this->updateJson('/Advanced/Motion/settings.json', [
            'video' => $settings['video'],
            'heading' => $settings['heading'],
            'overlay' => ($_POST['overlay'] == 1) ? true : false
        ]);

        Utility::refresh('/admin');
        $adminController->index('Video updated!');
    }

}