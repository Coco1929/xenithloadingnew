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
 * Class Admin
 *---------------------------------------------------------------
 */

namespace App\Models;


use Sys\Database\Manager;

/**
 * @package App\Models
 */
class Admin extends Manager
{
    public function getCurrentThemeData()
    {
        $query = $this->query("SELECT * FROM `gt_settings`");

        return $query->fetch();
    }

    public function getThemes()
    {
        $query = $this->query("SELECT * FROM `gt_themes` ORDER BY `id` ASC");

        return $query->fetchAll();
    }

    /**
     * @param $data
     */
    public function setMusicSettings($data)
    {
        if (isset($data['music_path'])) {
            $this->query("UPDATE `gt_settings` SET `music_pos` = :pos, `music_volume` = :volume,`music_path` = :path, `music_enabled` = :enabled , `music_name` = :uname", [
                ':path' => $data['music_path'],
                ':uname' => $data['music_name'],
                ':enabled' => $data['music_enabled'],
                ':pos' => $data['music_pos'],
                ':volume' => $data['music_volume']
            ]);
        } else {
            $this->query("UPDATE `gt_settings` SET  `music_pos` = :pos, `music_volume` = :volume, `music_name` = :uname, `music_enabled` = :enabled", [
                ':uname' => $data['music_name'],
                ':enabled' => $data['music_enabled'],
                ':pos' => $data['music_pos'],
                ':volume' => $data['music_volume']
            ]);
        }
    }

    /**
     * @param $path
     */
    public function setBackground($path)
    {
        $this->query("UPDATE `gt_settings` SET `bg_img` = :path", [":path" => $path]);
    }

    /**
     * @return mixed
     */
    public function getBackgroundImage()
    {
        return $this->query("SELECT `bg_img` FROM `gt_settings` WHERE 1")->fetch();
    }

    /**
     * @param $colors
     */
    public function setColors($colors)
    {
        $this->query("UPDATE `gt_settings` SET `first_circle_color` = :fcc,`second_circle_color`= :scc,`circle_bg_color`= :cbc,`text_color` = :tc WHERE 1", [
            ':fcc' => $colors['fcc'],
            ':scc' => $colors['scc'],
            ':cbc' => $colors['cbc'],
            ':tc' => $colors['tc']
        ]);
    }

    /**
     * @param $themeData
     */
    public function installTheme($themeData)
    {
        $this->query("INSERT INTO `gt_themes`(`name`, `bg_img`,`style` ,`circle_color`, `secondary_circle_color`, `circle_bg_color`, `text_color`, `icon`, `screen`,`description`, `advanced`) 
                             VALUES (:name, :bg_img, :style, :circle_color, :sc_color, :cbg_color, :text_color, :icon, :screen, :description, :advanced)", [
            ':name' => $themeData['name'],
            ':bg_img' => $themeData['bg_img'],
            ':style' => $themeData['style'],
            ':circle_color' => $themeData['circle_color'],
            ':sc_color' => $themeData['sc_color'],
            ':cbg_color' => $themeData['cbg_color'],
            ':text_color' => $themeData['text_color'],
            ':icon' => $themeData['icon'],
            ':screen' => $themeData['screen'],
            ':description' => $themeData['description'],
            ':advanced' => $themeData['advanced']
        ]);
    }

    public function issetTheme($name)
    {
        $query = $this->query("SELECT * FROM `gt_themes` WHERE `name` = :name", [':name' => $name]);

        if(!empty($query->fetch()))
            return true;
        else
            return false;
    }
    /**
     * @param $id
     * @return
     */
    public function deleteTheme($id)
    {
        $advanced = $this->query("SELECT * FROM `gt_themes` WHERE `id` = :id", [':id' => $id])->fetch();

        $this->query("DELETE FROM `gt_themes` WHERE `id` = :id", [':id' => $id]);

        return $advanced;
    }

    /**
     * @param $id
     */
    public function setTheme($id)
    {
        $themeData = $this->query("SELECT * FROM `gt_themes` WHERE `id` = :id", [':id' => $id])->fetch();

        $this->query("UPDATE `gt_themes` SET `active` = 0 WHERE `active` = 1; UPDATE `gt_themes` SET `active` = 1 WHERE `id` = :id", [':id' => $id]);
        $this->query("UPDATE `gt_settings` SET `bg_img` = :bg_img, `style` = :style, `first_circle_color` = :fcc,`second_circle_color`= :scc,`circle_bg_color`= :cbc,`text_color` = :tc WHERE 1", [
            ':bg_img' => $themeData['bg_img'],
            ':style' => $themeData['style'],
            ':fcc' => $themeData['circle_color'],
            ':scc' => $themeData['secondary_circle_color'],
            ':cbc' => $themeData['circle_bg_color'],
            ':tc' => $themeData['text_color']
        ]);
    }

    /**
     * @return mixed
     */
    public function getCurrentAdvancedTheme()
    {
        return $this->query('SELECT * FROM `gt_themes` WHERE `advanced` = 1 AND `active` = 1')->fetch();
    }

    /**
     * @return mixed
     */
    public function getLoadingStyles()
    {
        return $this->query('SELECT * FROM `gt_loading_styles`')->fetchAll();
    }

    /**
     * @param $id
     */
    public function setLoadingStyle($id)
    {
        $this->query('UPDATE `gt_settings` SET `style` = :id WHERE 1', [':id' => $id]);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function installStyle($data)
    {
        return $this->query("INSERT INTO `gt_loading_styles` (`name`, `alias`) VALUES (:name, :alias)",[':name' => $data['name'], ':alias' => $data['alias']]);
    }
}