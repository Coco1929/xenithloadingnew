<?php require_once("inc/PSR_Autoloader.php");

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
 * of this software anywhere other than on the platform is prohibited and punishable by
 * copyright law.
 *
 * Persons who have purchased a copy of the software on the platform are guaranteed to be
 * entitled to free updates to the software to version 2.0
 *
 * @package    GalaxyTools
 * @author    Gor Mkhitaryan
 * @copyright    Copyright (c) 2019, Gor Mkhitaryan <mkhitaryan.gor@inbox.ru>
 * @since    Version 1.0.0
 */

/**
 *---------------------------------------------------------------
 * Constants
 *---------------------------------------------------------------
 */

define('BASE_PATH', str_replace("\\", "/", ''));
define('VERSION', '1.0.6');

/**
 *---------------------------------------------------------------
 * Booting application
 *---------------------------------------------------------------
 */
spl_autoload_register(array('Autoloader', 'loadClass'));

\Sys\Boot::initializeApplication();
