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
 * Class Admin
 *---------------------------------------------------------------
 */

namespace App\Controllers;

use Sys\Auth;
use Sys\Controller;
use Sys\Utility;
use ZipArchive;

/**
 * @package App\Controllers
 */
class Admin extends Controller
{
    /**
     * @var array
     */
    private $authExceptions = [
        '/admin/login',
        '/admin/handleLoginData',
    ];

    /**
     * Admin constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        if (!isset($_SESSION)) session_start();

        try {
            parent::__construct();
        } catch (\ReflectionException $e) {
            $e->getMessage();
        }

        $auth = new Auth();

        if (!$auth->checkAuthentication() && !Utility::handleAuthExceptions($this->authExceptions)) {
            Utility::redirect('/admin/login');
        }

    }

    /**
     * @param null $state
     */
    public function index($state = null)
    {
        $themes = $this->model->getThemes();
        $styles = $this->model->getLoadingStyles();

        $currentThemeData = $this->model->getCurrentThemeData();
        $currentAdvancedTheme = $this->model->getCurrentAdvancedTheme();

        if (!empty($currentAdvancedTheme)) {
            $currentAdvancedThemeObjectFormat = "Advanced\\" . $currentAdvancedTheme['name'] . "\\" . $currentAdvancedTheme['name'];

            if (file_exists(BASE_PATH . str_replace('\\', '/', $currentAdvancedThemeObjectFormat) . ".php") && class_exists($currentAdvancedThemeObjectFormat)) {
                $this->view->renderMainPage([
                    'currentTheme'   => $currentThemeData,
                    'themes'         => $themes,
                    'state'          => $state,
                    'a_theme'        => $currentAdvancedTheme,
                    'a_theme_object' => new $currentAdvancedThemeObjectFormat,
                    'styles'         => $styles
                ]);
            } else {
                echo "Advanced theme installed incorrectly!";

                $this->view->renderMainPage([
                    'currentTheme' => $currentThemeData,
                    'themes'       => $themes,
                    'state'        => $state,
                    'styles'       => $styles
                ]);
            }
        } else {
            $this->view->renderMainPage([
                'currentTheme' => $currentThemeData,
                'themes'       => $themes,
                'state'        => $state,
                'styles'       => $styles
            ]);
        }
    }

    public function login()
    {
        if (!Utility::isAuth())
            $this->view->renderLoginPage();
        else
            Utility::redirect('/admin');
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
    }

    public function handleloginData()
    {
        $auth = new Auth();

        try {
            if ($auth->setAuthentication([
                'name'     => $_POST['username'],
                'password' => $_POST['password'],
            ])) {
                Utility::redirect('/admin');
            } else {
                $this->view->renderLoginPage('Incorrect username or password!');
            }
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function changeBackgroundMusic()
    {
        if ($_FILES['music_file']['name'] != "") {
            if (move_uploaded_file($_FILES["music_file"]["tmp_name"], BASE_PATH . "pub/" . Utility::translate($_FILES["music_file"]["name"]))) {
                $this->model->setMusicSettings([
                    'music_path'    => BASE_PATH . "pub/" . Utility::translate($_FILES["music_file"]["name"]),
                    'music_enabled' => (isset($_POST['enabled']) && $_POST['enabled'] == 'on') ? 1 : 0,
                    'music_name'    => $_POST['track_name'],
                    'music_pos'     => $_POST['pos'],
                    'music_volume'  => $_POST['volume']
                ]);
                $this->notify('Music settings updated');
            } else {
                $this->notify('Error: Music settings NOT updated');
            }
        } else {
            $this->model->setMusicSettings([
                'music_enabled' => (isset($_POST['enabled']) && $_POST['enabled'] == 'on') ? 1 : 0,
                'music_name'    => $_POST['track_name'],
                'music_pos'     => $_POST['pos'],
                'music_volume'  => $_POST['volume']
            ]);

            $this->notify('Music settings updated');
        }
    }

    public function changeBackground()
    {
        $currentAdvancedTheme = $this->model->getCurrentAdvancedTheme();

        if (!empty($currentAdvancedTheme) && strpos($_FILES['bg_img']['name'], '.webm')) {
            $this->notify("You can't use video background in this theme", 4);
        } else {
            if ($_FILES['bg_img']['name'] != "") {
                move_uploaded_file
                (
                    $_FILES["bg_img"]["tmp_name"],
                    BASE_PATH . "pub/" . Utility::translate($_FILES["bg_img"]["name"])
                );

                $this->model->setBackground(BASE_PATH . "pub/" . Utility::translate($_FILES["bg_img"]["name"]));

                $this->notify('Background updated');
            }
        }
    }

    public function changeStyle()
    {
        $this->model->setColors([
            'fcc' => $_POST['fcc'],
            'scc' => $_POST['scc'],
            'cbc' => $_POST['cbc'],
            'tc'  => $_POST['tc']
        ]);

        $this->model->setLoadingStyle($_POST['style']);

        $this->notify('Styles updated');
    }

    public function installPackage()
    {
        if ($_FILES['theme']['name'] != "") {

            if (move_uploaded_file($_FILES["theme"]["tmp_name"], BASE_PATH . "Sys/tmp/" . $_FILES["theme"]["name"])) {
                if (Utility::getExtension(BASE_PATH . "Sys/tmp/" . $_FILES["theme"]["name"]) == 'zip') {
                    $zip = new ZipArchive;
                    $res = $zip->open(BASE_PATH . "Sys/tmp/" . $_FILES["theme"]["name"]);

                    if ($res === TRUE)
                        $zip->extractTo(BASE_PATH . "Sys/tmp/");


                    if (file_exists(BASE_PATH . "Sys/tmp/theme.php")) {
                        $themeData = include(BASE_PATH . "Sys/tmp/theme.php");

                        if (!$this->model->issetTheme($themeData['name'])) {
                            if (isset($themeData['Advanced']) && $themeData['Advanced'] == true) {
                                $this->installAdvancedTheme($themeData, $zip);
                            } else {
                                if (copy(BASE_PATH . "Sys/tmp/" . $themeData['thumbnail'], BASE_PATH . "pub/themeicons/" . $themeData['thumbnail']) &&
                                    copy(BASE_PATH . "Sys/tmp/" . $themeData['screenshot'], BASE_PATH . "pub/themeicons/" . $themeData['screenshot']) &&
                                    copy(BASE_PATH . "Sys/tmp/" . $themeData['bg_img'], BASE_PATH . "pub/themeicons/" . $themeData['bg_img'])) {
                                    $zip->close();
                                    @Utility::truncate(BASE_PATH . 'Sys/tmp');


                                    $this->model->installTheme([
                                        'name'         => $themeData['name'],
                                        'icon'         => $themeData['thumbnail'],
                                        'screen'       => $themeData['screenshot'],
                                        'description'  => $themeData['description'],
                                        'style'        => (isset($themeData['style'])) ? $themeData['style'] : 'circle',
                                        'bg_img'       => 'pub/themeicons/' . $themeData['bg_img'],
                                        'circle_color' => $themeData['colors']['first_circle_color'],
                                        'sc_color'     => $themeData['colors']['second_circle_color'],
                                        'cbg_color'    => $themeData['colors']['circle_bg_color'],
                                        'text_color'   => $themeData['colors']['text_color'],
                                        'Advanced'     => 0
                                    ]);

                                    $this->notify('Theme installed');

                                } else {
                                    $zip->close();
                                    Utility::truncate(BASE_PATH . 'Sys/tmp');

                                    $this->notify('Error: Theme not installed!', 2);
                                }
                            }
                        } else {
                            $zip->close();
                            Utility::truncate(BASE_PATH . 'Sys/tmp');
                            $this->notify('Theme already installed', 2);
                        }
                    } elseif (file_exists(BASE_PATH . "Sys/tmp/style.php")) {
                        $this->installStyle();
                    } else {
                        $zip->close();
                        Utility::truncate(BASE_PATH . 'Sys/tmp');
                        $this->notify('Theme already installed', 2);
                    }
                } else {
                    Utility::truncate(BASE_PATH . 'Sys/tmp');
                    $this->notify('Error: Uploaded file not a ZIP archive', 2);
                }
            } else {
                $this->notify('Error: Theme not installed, 2');
            }
        }
    }

    /**
     * @param array      $themeData
     * @param ZipArchive $zip
     */
    private function installAdvancedTheme(array $themeData, ZipArchive $zip)
    {
        $zip->extractTo(BASE_PATH . 'Advanced/');
        $zip->close();

        Utility::recurse_copy(BASE_PATH . 'Advanced/pub', BASE_PATH . 'pub/' . strtolower($themeData['name']));
        Utility::delete_dir(BASE_PATH . "Advanced/pub");
        Utility::truncate(BASE_PATH . 'Sys/tmp');;

        unlink($_SERVER['DOCUMENT_ROOT'] . '/Advanced/theme.php');
        unlink($_SERVER['DOCUMENT_ROOT'] . '/Sys/tmp/theme.php');

        $this->model->installTheme([
            'name'         => $themeData['name'],
            'icon'         => $themeData['thumbnail'],
            'screen'       => $themeData['screenshot'],
            'description'  => $themeData['description'],
            'style'        => $themeData['style'],
            'bg_img'       => 'pub/themeicons/' . $themeData['bg_img'],
            'circle_color' => $themeData['colors']['first_circle_color'],
            'sc_color'     => $themeData['colors']['second_circle_color'],
            'cbg_color'    => $themeData['colors']['circle_bg_color'],
            'text_color'   => $themeData['colors']['text_color'],
            'Advanced'     => 1
        ]);
    }

    public function exportTheme()
    {
        $themeData = $this->model->getCurrentThemeData();
        $zipName = 'pub/' . time() . 'theme.zip';

        $bg_img = explode('/', $themeData['bg_img']);

        $zip = new ZipArchive;
        $res = $zip->open($zipName, ZipArchive::CREATE);

        if ($res === TRUE) {
            $zip->addFromString('theme.php', "
                <?php
                
                return [
                    'name' => '" . addslashes($_POST['name']) . "',
                
                    'bg_img' => '" . $bg_img[1] . "',
                    'thumbnail' => '" . $_FILES['thumb']['name'] . "',
                    'screenshot' => '" . $_FILES['screen']['name'] . "',
                    'style' => " . $themeData['style'] . ",
                    'description' => '" . addslashes($_POST['desc']) . "',
                    'Advanced' => 0,
                    
                    'colors' => [
                        'first_circle_color' => '" . $themeData['first_circle_color'] . "',
                        'second_circle_color' => '" . $themeData['second_circle_color'] . "',
                        'circle_bg_color' => '" . $themeData['circle_bg_color'] . "',
                        'text_color' => '" . $themeData['text_color'] . "'
                    ]
                ];
                
                ?>           
                "
            );

            $zip->addFile($_SERVER['DOCUMENT_ROOT'] . '/' . $themeData['bg_img'], $bg_img[1]);
            $zip->addFile($_FILES['thumb']['tmp_name'], $_FILES['thumb']['name']);
            $zip->addFile($_FILES['screen']['tmp_name'], $_FILES['screen']['name']);

            $zip->close();

            if (ob_get_level()) {
                ob_end_clean();
            }

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($zipName));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($zipName));

            readfile($zipName);

            unlink($zipName);
        }
    }

    public function deleteTheme()
    {
        $themeData = $this->model->deleteTheme($_POST['id']);

        if ($themeData['advanced'] == 1) {
            Utility::delete_dir(BASE_PATH . 'Advanced/' . $themeData['name']);
            Utility::delete_dir(BASE_PATH . 'pub/' . $themeData['name']);
        }

        unlink(BASE_PATH . 'pub/themeicons/' . $themeData['icon']);
        unlink(BASE_PATH . $themeData['bg_img']);
        unlink(BASE_PATH . 'pub/themeicons/' . $themeData['screen']);

        $this->notify('Theme was successfully deleted!');
    }

    public function setTheme()
    {
        $this->model->setTheme($_POST['id']);

        $this->notify('Theme was successfully assigned!');
    }

    public function installStyle()
    {
        if ($_FILES['style']['name'] != "") {

            if (move_uploaded_file($_FILES["style"]["tmp_name"], BASE_PATH . "Sys/tmp/" . $_FILES["style"]["name"])) {

                if (Utility::getExtension(BASE_PATH . "Sys/tmp/" . $_FILES["style"]["name"]) == 'zip') {
                    $zip = new ZipArchive;

                    $res = $zip->open(BASE_PATH . "Sys/tmp/" . $_FILES["style"]["name"]);

                    if ($res === TRUE) {
                        $zip->extractTo(BASE_PATH . "Sys/tmp/");
                    }
                    if (file_exists(BASE_PATH . "Sys/tmp/style.php")) {
                        $styleData = include(BASE_PATH . "Sys/tmp/style.php");

                        $zip->extractTo(BASE_PATH . 'styles/');
                        $zip->close();

                        if ($this->model->installStyle([
                            'name'  => $styleData['name'],
                            'alias' => $styleData['alias'],
                        ])) {

                            array_map('unlink', glob(BASE_PATH . "Sys/tmp/" . $styleData['alias'] . "/*"));
                            rmdir(BASE_PATH . "Sys/tmp/" . $styleData['alias']);
                            array_map('unlink', glob(BASE_PATH . "Sys/tmp/*"));
                        } else {
                            array_map('unlink', glob(BASE_PATH . "Sys/tmp/" . $styleData['alias'] . "/*"));
                            rmdir(BASE_PATH . "Sys/tmp/" . $styleData['alias']);
                            array_map('unlink', glob(BASE_PATH . "Sys/tmp/*"));
                            $this->index('Error: Style not installed!');
                        }
                    } else {
                        $zip->close();
                        Utility::truncate(BASE_PATH . 'Sys/tmp');
                        $this->notify('Error: Style not installed!');
                    }
                } else {
                    Utility::truncate(BASE_PATH . 'Sys/tmp');
                    $this->notify('Error: Uploaded file not a ZIP archive');
                }
            } else {
                Utility::truncate(BASE_PATH . 'Sys/tmp');
                $this->notify('Error: Style not installed!');
            }
        } else {
            $this->notify('Error: Style not installed!');
        }
    }

    private function notify($message, $delay = 1)
    {
        Utility::refresh('/admin', $delay);
        $this->index($message);
    }

    public function registerUser()
    {

    }
}