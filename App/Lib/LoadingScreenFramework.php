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
 * Class LoadingScreenFramework
 *---------------------------------------------------------------
 */

namespace App\Lib;


class LoadingScreenFramework
{
    /**
     * @param $steamid
     * @return mixed
     */
    public static function render()
    {
        echo "<script type='text/javascript' >
var total_;
    
function SetFilesTotal(total) {
    total_ = total;
}

function SetFilesNeeded(needed) {
    if (needed != total_) {
        $('#progress').css('width', (((needed / total_) * 100) - 100) * (-1) + '%');
        $('#progress-percentage').html(Math.floor((((needed / total_) * 100) - 100) * (-1)) + '%');
    } else {
        $('#progress').css('width', '100%');
        $('#progress-percentage').html('100%');
    }
}

function GameDetails(servername, serverurl, mapname, maxplayers, steamid, gamemode) {

    $('#mapname').html(mapname);
    $('#gamemode').html(gamemode);
    $('#maxply').html(maxplayers);
    $('#mapimg').attr('src', '/pub/maps/' + mapname + '.jpg');
    
    const request = new XMLHttpRequest();

// Указываем путь до файла на се рвере, который будет обрабатывать наш запрос
    const url = '/main/ajaxGetData';

// Так же как и в GET составляем строку с данными, но уже без пути к файлу
    const params = 'sid=' + steamid;

    /* Указываем что соединение	у нас будет POST, говорим что путь к файлу в переменной url, и что запрос у нас
    асинхронный, по умолчанию так и есть не стоит его указывать, еще есть 4-й параметр пароль авторизации, но этот
        параметр тоже необязателен.*/
    request.open('POST', url, true);

//В заголовке говорим что тип передаваемых данных закодирован.
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    request.addEventListener('readystatechange', function () {

        var responsedata = eval('(' + request.responseText + ')');
        document.getElementById('steamid').innerHTML = responsedata.steamid;
        document.getElementById('plyimg').src = responsedata.udata.avatarFull;
        document.getElementById('plyname').innerHTML = responsedata.udata.steamID;
    });

//	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос.
    request.send(params);
}

function SetStatusChanged(status) {
   $('#status').html(status);
}</script>";
    }
}