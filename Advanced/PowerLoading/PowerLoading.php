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

namespace Advanced\PowerLoading;

use App\Controllers\Admin;
use Sys\AdvancedThemeInterface;
use Sys\Templater;
use Sys\Utility;

/**
 * Class Elegy
 * @package Advanced\Elegy
 */
class PowerLoading implements AdvancedThemeInterface
{
    /**
     * @var Templater
     */
    private $templater;

    /**
     * @var string
     */
    private $tplPath = BASE_PATH . 'Advanced/PowerLoading/templates/';

    /**
     * Elegy constructor.
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
        $rules = $this->parseJson('/Advanced/PowerLoading/rules.json');
        $staff = $this->parseJson('/Advanced/PowerLoading/staff.json');
        $desc  = $this->parseJson('/Advanced/PowerLoading/desc.json');
        
        echo $this->templater->abs_render($this->tplPath . 'backend/settings', [
            'rules' => $rules,
            'staff' => $staff,
            'desc' => $desc["desc"]
        ]);
    }


    public function renderMainPage()
    {
        $adminModel = new \App\Models\Admin();

        $rules = $this->parseJson('/Advanced/PowerLoading/rules.json');
        $staff = $this->parseJson('/Advanced/PowerLoading/staff.json');
        $desc  = $this->parseJson('/Advanced/PowerLoading/desc.json');

        $themeData = $adminModel->getCurrentThemeData();

        echo $this->templater->abs_render($this->tplPath . 'frontend/main', [
            'theme' => $themeData,
            'rules' => $rules,
            'staff' => $staff,
            'desc'  => $desc["desc"]
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
    public function updateRules()
    {
        $this->updateJson('/Advanced/PowerLoading/rules.json', [
            "1" => $_POST['rule1'],
            "2" => $_POST['rule2'],
            "3" => $_POST['rule3'],
            "4" => $_POST['rule4'],
            "5" => $_POST['rule5'],
            "6" => $_POST['rule6'],
            "7" => $_POST['rule7'],
            "8" => $_POST['rule8'],
            "9" => $_POST['rule9'],
        ]);

        $adminController = new Admin();

        Utility::refresh('/admin');
        $adminController->index('Rules updated!');
    }

    /**
     * @throws \Exception
     */
    public function updateStaff()
    {
        $this->updateJson('/Advanced/PowerLoading/staff.json', [
            "1" => [
                "job" => $_POST['row1'],
                "steamid" => $_POST['st1'],
            ],
            "2" => [
                "job" => $_POST['row2'],
                "steamid" => $_POST['st2'],
            ],
            "3" => [
                "job" => $_POST['row3'],
                "steamid" => $_POST['st3'],
            ],
            "4" => [
                "job" => $_POST['row4'],
                "steamid" => $_POST['st4'],
            ],
            "5" => [
                "job" => $_POST['row5'],
                "steamid" => $_POST['st5'],
            ],
        ]);

        $adminController = new Admin();

        Utility::refresh('/admin');
        $adminController->index('Staff information updated!');
    }

    /**
     * @throws \Exception
     */
    public function updateDesc()
    {
        $this->updateJson('/Advanced/PowerLoading/desc.json', [
           "desc" => $_POST['desc']
        ]);

        $adminController = new Admin();

        Utility::refresh('/admin');
        $adminController->index('Description updated!');
    }
}