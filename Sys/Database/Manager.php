<?php
/**
 * Galaxy Tools
 *
 * Web tool for Garry's mod servers
 *
 * This content is released under the commercial license
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
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
 * Class Manager
 *---------------------------------------------------------------
 */

namespace Sys\Database;

use Sys\Utility;

/**
 * Class Manager
 * @package Sys\Database
 */
class Manager
{
    /**
     * @var \PDO
     */
    private $dbo = null;

    public function __construct()
    {
        if ($this->dbo == null) {
            $config = Utility::getConfig();
            $dsn = 'mysql:host=' . $config['mysql_connection']['host'] . ';dbname=' . $config['mysql_connection']['current_db'];

            $this->dbo = new \PDO($dsn, $config['mysql_connection']['user'], $config['mysql_connection']['password']);
            $this->dbo->exec("SET NAMES utf8");
        }
    }

    /**
     * @param $query
     * @param array $params
     * @return mixed
     */
    public function query($query, $params = [])
    {
        $tmp = $this->dbo->prepare($query);
        $tmp->execute($params);

        return $tmp;
    }

    public function close()
    {
        $this->dbo = null;
    }
}