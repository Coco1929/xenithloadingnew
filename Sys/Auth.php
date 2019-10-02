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
 * Class Auth
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * @package Sys
 */
class Auth
{
    /**
     * Table, which used to store users
     * Should be organized like:
     *
     * ID(int) | NAME(string) | PASSWORD(string) | SALT(string) | ACCESS_LEVEL(int) | AUTH_TOKEN(string)
     *
     * @var string
     */
    private $usersTable = 'gt_users';

    /**
     * @var \PDO $dbo
     */
    private $dbo;

    /**
     * @return string
     */
    public function getUsersTable()
    {
        return $this->usersTable;
    }

    /**
     * @param string $usersTable
     */
    public function setUsersTable($usersTable)
    {
        $this->usersTable = $usersTable;
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public function setAuthentication(array $data = [])
    {
        $this->dbo = ServiceContainer::extract('Database');

        /**
         * @var \PDOStatement $username
         */
        $realdata = $this->dbo->query('SELECT * FROM `'.$this->usersTable.'` WHERE `name` = :uname', [
            ":uname" => $data['name']
        ])->fetch();

        $passwordHash = new Hash($data['password'], $realdata['salt']);

        if ($passwordHash->getHash() == $realdata['password']) {
            $this->authorize($realdata['id']);

            return true;
        } else
            return false;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function checkAuthentication()
    {
        $this->dbo = ServiceContainer::extract('Database');

        if (isset($_SESSION['auth_token']) && isset($_SESSION['user_id'])) {

            $query = $this->dbo->query('SELECT * FROM '.$this->usersTable.' WHERE `auth_token` = :auth_token AND `id` = :id', [
                ':auth_token' => $_SESSION['auth_token'],
                ':id' => $_SESSION['user_id']
            ]);

            if (!empty($query->fetch()))
                return true;
            else
                return false;

        } else {
            return false;
        }
    }

    /**
     * Starts new session with new auth token
     *
     * @param int $uid
     * @throws \Exception
     */
    private function authorize($uid)
    {
        $hash = new Hash();

        $_SESSION['auth_token'] = $hash->getHash();
        $_SESSION['user_id'] = $uid;

        $this->dbo->query("UPDATE " . $this->usersTable . " SET `auth_token` = :auth_token WHERE `id` = :id", [
            ':auth_token' => $hash->getHash(),
            ':id' => $uid
        ]);
    }

    /**
     * Registering new user. Returns 2 if user with specified name already exists.
     *
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public function registerUser($data = [])
    {
        if (!empty($data)) {
            $this->dbo = ServiceContainer::extract('Database');

            if (empty($this->dbo->query("SELECT * FROM " . $this->usersTable . " WHERE `name` = :uname", [':uname' => $data['name']])->fetch())) {

                $password = new Hash($data['password']);

                $query = $this->dbo->query("INSERT INTO " . $this->usersTable . " (`name`, `password`, `salt`, `access_level`) VALUES(:uname, :upassword, :salt, :access_level)", [
                    ':uname' => $data['name'],
                    ':upassword' => $password->getHash(),
                    ':salt' => $password->getSalt(),
                    ':access_level' => $data['access_level']
                ]);

                return true;
            } else {
                /**
                 * This function returns 2, if user with specified name already exists.
                 */
                return 2;
            }
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
        Utility::redirect('/admin/login');
    }
}