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
 * Class Hash
 *---------------------------------------------------------------
 */

namespace Sys;

/**
 * @package Sys
 */
class Hash
{
    /**
     * @var string
     */
    private $hash;

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @var string
     */
    private $salt;

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }


    /**
     * @var int
     */
    private $length = 16;

    /**
     * @var int
     */
    private $iterations = 1000;

    /**
     * Hash constructor.
     * @param string $string
     * @param string|null $salt
     */
    public function __construct($string = null, $salt = null)
    {
        if($string == null)
            $string = $this->randomString(16, 'all');

        if($salt == null)
            $salt =  $this->randomString($this->length, 'all');

        $this->hash = hash_pbkdf2("sha256", $string, $salt, $this->iterations, $this->length);
        $this->salt = $salt;
    }

    /**
     * Generates random string
     *
     * @param $length
     * @param $chartypes
     * @return string
     */
    public function randomString($length, $chartypes)
    {
        $chartypes_array=explode(",", $chartypes);
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '1234567890';
        $special = '^@*+-+%()!?';
        $chars = "";

        if (in_array('all', $chartypes_array)) {
            $chars = $lower . $upper. $numbers . $special;
        } else {
            if(in_array('lower', $chartypes_array))
                $chars = $lower;
            if(in_array('upper', $chartypes_array))
                $chars .= $upper;
            if(in_array('numbers', $chartypes_array))
                $chars .= $numbers;
            if(in_array('special', $chartypes_array))
                $chars .= $special;
        }

        $chars_length = strlen($chars) - 1;
        $string = $chars{rand(0, $chars_length)};

        for ($i = 1; $i < $length; $i = strlen($string)) {
            $random = $chars{rand(0, $chars_length)};
            if ($random != $string{$i - 1}) $string .= $random;
        }

        return $string;
    }
}