<?php

define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/');

require_once ("../Sys/Database/Manager.php");
require_once ("../Sys/Utility.php");
require_once ("../Sys/Auth.php");
require_once ("../Sys/Hash.php");

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

$format = "<?php
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
 * which is called \"Gmodstore\" (hereinafter referred to as \"platform\"). Distribution
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

return [
    'default_controller' => 'Main',
    'mysql_connection' => [
        'host' => '".$_POST['host']."',
        'user' => '".$_POST['user']."',
        'password' => '".trim($_POST['password'],' ')."',
        'current_db'   => '".$_POST['db']."'
    ]
];
";

file_put_contents('../inc/config.php', $format);

$gt_loading_styles = array(
    array('id' => '1','name' => 'Circle','alias' => 'circle'),
    array('id' => '2','name' => 'Wave','alias' => 'wave')
);

$gt_settings = array(
    array('music_path' => '','music_enabled' => '1','music_volume' => '0','music_pos' => '2','music_name' => 'Example music track','first_circle_color' => 'FFFFFF','second_circle_color' => 'D191C0','circle_bg_color' => 'D6D6D6','style' => 'circle','text_color' => 'FFFFFF','bg_img' => 'pub/themeicons/minimal_bg.jpg')
);

$gt_themes = array(
  array('style' => 'circle','name' => 'Sunset','bg_img' => 'pub/themeicons/sunset_bg.jpg','circle_color' => 'FFFFFF','secondary_circle_color' => '1F44D1','circle_bg_color' => 'BFBFBF','text_color' => 'FFFFFF','icon' => 'sunset_thumb.jpg','screen' => 'sunset_screen.jpg','description' => 'Sunset - part of default Galaxy Tools package','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Ocean','bg_img' => 'pub/themeicons/ocean_bg.jpg','circle_color' => 'B382FF','secondary_circle_color' => '13BABF','circle_bg_color' => 'BFBFBF','text_color' => 'FFFFFF','icon' => 'ocean_thumb.jpg','screen' => 'ocean_screen.jpg','description' => 'Ocean  - part of default Galaxy Tools package','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Galaxy','bg_img' => 'pub/themeicons/login_page_bg.jpg','circle_color' => 'FFFFFF','secondary_circle_color' => 'D191C0','circle_bg_color' => 'D6D6D6','text_color' => 'FFFFFF','icon' => 'galaxy_thumb.jpg','screen' => 'galaxy_screen.jpg','description' => 'Galaxy is a default theme of Galaxy Tools','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Volcano','bg_img' => 'pub/themeicons/volcano_bg.jpg','circle_color' => 'FF0000','secondary_circle_color' => 'E36B39','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'volcano_thumb.jpg','screen' => 'volcano_screen.jpg','description' => 'Volcano - part of default Galaxy Tools package','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Universe','bg_img' => 'pub/themeicons/universe_bg.jpg','circle_color' => '00F8FF','secondary_circle_color' => '007A8C','circle_bg_color' => 'D4D4D4','text_color' => 'FFFFFF','icon' => 'universe_thumb.jpg','screen' => 'universe_screen.jpg','description' => 'Universe - part of default Galaxy Tools package','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Urban','bg_img' => 'pub/themeicons/urban_bg.jpg','circle_color' => '4F1D1D','secondary_circle_color' => 'FFFFFF','circle_bg_color' => 'EA3539','text_color' => 'FFFFFF','icon' => 'urban_thumb.jpg','screen' => 'urban_screen.jpg','description' => 'Urban - part of default Galaxy Tools package','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Downtown','bg_img' => 'pub/themeicons/dark_rp.jpg','circle_color' => '34FF2B','secondary_circle_color' => 'FFFE52','circle_bg_color' => 'CCCCCC','text_color' => 'FFFFFF','icon' => 'dark_rp_thumb.jpg','screen' => 'dark_rp_screen.jpg','description' => 'Downtown - great theme for Dark RP server','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'City Life','bg_img' => 'pub/themeicons/dark_rp_2.jpg','circle_color' => '3882FF','secondary_circle_color' => 'FFFFFF','circle_bg_color' => 'CCCCCC','text_color' => 'FFFFFF','icon' => 'dark_rp_2_thumb.jpg','screen' => 'dark_rp_2_screen.jpg','description' => 'City Life - nice and neat Dark RP loading screen','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Sleeping Town','bg_img' => 'pub/themeicons/sleeping_town_bg.jpg','circle_color' => 'FFFFFF','secondary_circle_color' => 'B817FF','circle_bg_color' => '9C9C9C','text_color' => 'FFFFFF','icon' => 'sleeping_town_bg_thumb.jpg','screen' => 'sleeping_town_screen.jpg','description' => 'Sleeping Town - dark loading screen for Dark RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Wild','bg_img' => 'pub/themeicons/wild_bg.jpg','circle_color' => 'FFFFFF','secondary_circle_color' => 'FF7E00','circle_bg_color' => '9C9C9C','text_color' => 'FFFFFF','icon' => 'wild_bg_thumb.jpg','screen' => 'wild_screen.jpg','description' => 'Wild - this lovely loading screen will perfectly suit your Dark RP server','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Forest','bg_img' => 'pub/themeicons/forest_bg.jpg','circle_color' => 'FFFFFF','secondary_circle_color' => 'FFEB6E','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'forest_thumb.jpg','screen' => 'forest_screen.jpg','description' => 'Forest - great loading screen for your server!','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'District','bg_img' => 'pub/themeicons/district_bg.jpg','circle_color' => 'FF6321','secondary_circle_color' => '69B0FF','circle_bg_color' => 'C7C7C7','text_color' => 'FFFFFF','icon' => 'district_thumb.jpg','screen' => 'district_screen.jpg','description' => 'District - beautiful loading screen for your Dark RP server!','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Squad','bg_img' => 'pub/themeicons/squad_bg.jpg','circle_color' => '3DBA41','secondary_circle_color' => '3BFF54','circle_bg_color' => 'C7C7C7','text_color' => 'FFFFFF','icon' => 'squad_thumb.jpg','screen' => 'squad_screen.jpg','description' => 'Squad - great loading screen for Military RP server','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Glory','bg_img' => 'pub/themeicons/glory_bg.jpg','circle_color' => 'BA8100','secondary_circle_color' => 'FFBA00','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'glory_thumb.jpg','screen' => 'glory_screen.jpg','description' => 'Glory - the right choise for Military RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Honor','bg_img' => 'pub/themeicons/honor_bg.jpg','circle_color' => '0F731C','secondary_circle_color' => '169476','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'honor_thumb.jpg','screen' => 'honor_screen.jpg','description' => 'Honor - loading screen for WW2 Military RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Jungle','bg_img' => 'pub/themeicons/jungle_bg.jpg','circle_color' => '0F731C','secondary_circle_color' => '169476','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'jungle_thumb.jpg','screen' => 'jungle_screen.jpg','description' => 'Jungle - loading screen for Military RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Devastation','bg_img' => 'pub/themeicons/devastation_bg.jpg','circle_color' => 'FF0000','secondary_circle_color' => '000000','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'devastation_thumb.jpg','screen' => 'devastation_screen.jpg','description' => 'Devastation - great loading screen for WW2 Military RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Warfare','bg_img' => 'pub/themeicons/warfare_bg.jpg','circle_color' => 'FFB919','secondary_circle_color' => 'FF8C36','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'warfare_thumb.jpg','screen' => 'warfare_screen.jpg','description' => 'Warfare - great theme for Military RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Superiority','bg_img' => 'pub/themeicons/superiority_bg.jpg','circle_color' => 'C70000','secondary_circle_color' => 'F2FF33','circle_bg_color' => '8D8FC7','text_color' => 'FFFFFF','icon' => 'superiority_thumb.jpg','screen' => 'superiority_screen.jpg','description' => 'Superiority - loading screen theme for Star Wars RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Hazard','bg_img' => 'pub/themeicons/hazard.jpg','circle_color' => 'C7A054','secondary_circle_color' => 'FF3A00','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'hazard_thumb.jpg','screen' => 'hazard_screen.jpg','description' => 'Hazard - loading screen for Star Wars RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Insecurity','bg_img' => 'pub/themeicons/insecurity_bg.jpg','circle_color' => 'FFF60D','secondary_circle_color' => 'FAFFC7','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'insecurity_thumb.jpg','screen' => 'insecurity_screen.jpg','description' => 'Insecurity - loading screen for Star Wars RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Assault','bg_img' => 'pub/themeicons/assault_bg.jpg','circle_color' => '00A3FF','secondary_circle_color' => '2987FF','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'assault_thumb.jpg','screen' => 'assault_screen.jpg','description' => 'Assault - loading screen theme for Star Wars RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Encounter','bg_img' => 'pub/themeicons/encounter_bg.jpg','circle_color' => 'FFFE00','secondary_circle_color' => 'FF0000','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'encounter_thumb.jpg','screen' => 'encounter_screen.jpg','description' => 'Encounter - great loading screen for SWRP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'Igneous','bg_img' => 'pub/themeicons/igneous_bg.jpg','circle_color' => 'FFFFFF','secondary_circle_color' => 'FFA430','circle_bg_color' => 'FFFFFF','text_color' => 'FFFFFF','icon' => 'igneous_thumb.jpg','screen' => 'igneous_screen.jpg','description' => 'Igneous - flamy theme for Star Wars RP','active' => '0','advanced' => '0'),
  array('style' => 'circle','name' => 'PowerLoading','bg_img' => 'pub/themeicons/powerloading_bg.jpg','circle_color' => NULL,'secondary_circle_color' => NULL,'circle_bg_color' => NULL,'text_color' => NULL,'icon' => 'power_loading_bg.jpg','screen' => 'powerloading_screen.jpg','description' => 'PowerLoading - default advanced theme of Galaxy Tools','active' => '0','advanced' => '1'),
  array('style' => 'circle','name' => 'Motion','bg_img' => NULL,'circle_color' => NULL,'secondary_circle_color' => NULL,'circle_bg_color' => NULL,'text_color' => NULL,'icon' => 'motion_thumb.jpg','screen' => 'motion_screen.jpg','description' => 'Motion - theme for Galaxy Tools with video background','active' => '0','advanced' => '1'),
  array('style' => 'circle','name' => 'Eternal','bg_img' => 'pub/themeicons/eternal_bg.jpg','circle_color' => 'ffffff','secondary_circle_color' => 'ffffff','circle_bg_color' => 'ffffff','text_color' => 'ffffff','icon' => 'eternal_thumb.jpg','screen' => 'eternal_screen.jpg','description' => 'Eternal - simple and beautiful advanced theme for Galaxy Tools','active' => '0','advanced' => '1'),
  array('style' => 'circle','name' => 'Minimal','bg_img' => 'pub/themeicons/minimal_bg.jpg','circle_color' => 'ffffff','secondary_circle_color' => 'ffffff','circle_bg_color' => 'ffffff','text_color' => 'ffffff','icon' => 'minimal_thumb.jpg','screen' => 'minimal_screen.jpg','description' => 'Minimal - simple and beautiful advanced theme for Galaxy Tools','active' => '1','advanced' => '1'),
  array('style' => 'circle','name' => 'Infinity','bg_img' => 'pub/themeicons/infinity_bg.jpg','circle_color' => 'ffffff','secondary_circle_color' => 'ffffff','circle_bg_color' => 'ffffff','text_color' => 'ffffff','icon' => 'infinity_thumb.jpg','screen' => 'infinity_screen.jpg','description' => 'Infinity - simple and beautiful advanced theme for Galaxy Tools','active' => '0','advanced' => '1'),
  array('style' => 'circle','name' => 'Millenium','bg_img' => 'pub/themeicons/millenium_bg.jpg','circle_color' => 'ffffff','secondary_circle_color' => 'ffffff','circle_bg_color' => 'ffffff','text_color' => 'ffffff','icon' => 'millenium_thumb.jpg','screen' => 'millenium_screen.jpg','description' => 'Millenium - simple and beautiful advanced theme for Galaxy Tools','active' => '0','advanced' => '1')
);


$db = new Sys\Database\Manager();

$db->query("CREATE TABLE gt_loading_styles (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NULL,
alias VARCHAR(50) NULL
);");

foreach($gt_loading_styles as $Item) {
    $db->query("INSERT INTO `gt_loading_styles` (`name`, `alias`) VALUES (:name, :alias)",[
        ':name' => $Item['name'],
        ':alias' => $Item['alias']
    ]);
}

$db->query("CREATE TABLE gt_settings (
music_path VARCHAR(50) NULL,
music_enabled INT(11) NULL,
music_volume INT(11) NULL,
music_pos INT(11) NULL,
music_name VARCHAR(50) NULL,
first_circle_color VARCHAR(50) NULL,
second_circle_color VARCHAR(50) NULL,
circle_bg_color VARCHAR(50) NULL,
style VARCHAR(50) NULL,
text_color VARCHAR(50) NULL,
bg_img VARCHAR(50) NULL
);");

$db->query("INSERT INTO `gt_settings`(`music_path`, `music_enabled`, `music_volume`, `music_pos`, `music_name`, 
                                            `first_circle_color`, `second_circle_color`, `circle_bg_color`, `style`, 
                                            `text_color`, `bg_img`) 
VALUES (:music_path,:music_enabled,:music_volume,:music_pos,:music_name,:first_circle_color,:second_circle_color,
:circle_bg_color,:style,:text_color,:bg_img)", [
    ':music_path' => $gt_settings[0]['music_path'],
    ':music_enabled' => $gt_settings[0]['music_enabled'],
    ':music_volume' => $gt_settings[0]['music_volume'],
    ':music_pos' => $gt_settings[0]['music_pos'],
    ':music_name' => $gt_settings[0]['music_name'],
    ':first_circle_color' => $gt_settings[0]['first_circle_color'],
    ':second_circle_color' => $gt_settings[0]['second_circle_color'],
    ':circle_bg_color' => $gt_settings[0]['circle_bg_color'],
    ':style' => $gt_settings[0]['style'],
    ':text_color' => $gt_settings[0]['text_color'],
    ':bg_img' => $gt_settings[0]['bg_img'],
]);


$db->query("CREATE TABLE gt_themes (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
style VARCHAR(50) NULL,
name VARCHAR(50) NULL,
bg_img VARCHAR(50) NULL,
circle_color VARCHAR(50) NULL,
secondary_circle_color VARCHAR(50) NULL,
circle_bg_color VARCHAR(50) NULL,
text_color VARCHAR(50) NULL,
icon VARCHAR(50) NULL,
screen VARCHAR(50) NULL,
description TEXT NULL,
active INT(11) NULL,
advanced VARCHAR(50) NULL
);");

foreach($gt_themes as $Item) {
    $db->query("INSERT INTO `gt_themes`(`style`, `name`, `bg_img`, `circle_color`, `secondary_circle_color`, 
                                              `circle_bg_color`, `text_color`, `icon`, `screen`, `description`, `active`,
                                               `advanced`) 
    VALUES (:style,:name,:bg_img,:circle_color,:secondary_circle_color,:circle_bg_color,:text_color,:icon,:screen,:description,:active,:advanced)", [
        ':style' => $Item['style'],
        ':name' => $Item['name'],
        ':bg_img' => $Item['bg_img'],
        ':circle_color' => $Item['circle_color'],
        ':secondary_circle_color' => $Item['secondary_circle_color'],
        ':circle_bg_color' => $Item['circle_bg_color'],
        ':text_color' => $Item['text_color'],
        ':icon' => $Item['icon'],
        ':screen' => $Item['screen'],
        ':description' => $Item['description'],
        ':active' => $Item['active'],
        ':advanced' => $Item['advanced'],
    ]);
}

$db->query("CREATE TABLE gt_users (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NULL,
password VARCHAR(50) NULL,
salt VARCHAR(50) NULL,
access_level INT(11) NULL,
auth_token VARCHAR(50) NULL
);");

$password = new Sys\Hash($_POST['apass']);

$query = $db->query("INSERT INTO `gt_users` (`name`, `password`, `salt`, `access_level`) VALUES(:uname, :upassword, :salt, :access_level)", [
    ':uname' => $_POST['auser'],
    ':upassword' => $password->getHash(),
    ':salt' => $password->getSalt(),
    ':access_level' => 3
]);

header('Location: /admin/login');


