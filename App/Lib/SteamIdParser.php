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
 * Class SteamIdParser
 *---------------------------------------------------------------
 */

namespace App\Lib;


class SteamIdParser
{
    /**
     * @param $steamid
     * @return mixed
     */
    public static function getData($steamid)
    {
        return json_decode(json_encode(simplexml_load_string(file_get_contents("https://steamcommunity.com/profiles/".$steamid."/?xml=1"), "SimpleXMLElement", LIBXML_NOCDATA)),TRUE);
    }

    /**
     * @return string
     */
    public static function getIngameSteamId($steamid)
    {
        $authserver = bcsub( $steamid, '76561197960265728' ) & 1;
        $authid = ( bcsub( $steamid, '76561197960265728' ) - $authserver ) / 2;

        return "STEAM_0:$authserver:$authid";
    }
}