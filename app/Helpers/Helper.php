<?php

function unicode_escape_decode($str)
{
    return html_entity_decode(
        preg_replace('~\\\u([a-zA-Z0-9]{4})~', '&#x$1;', $str), null, 'UTF-8'
    );
}

function getDateInWords()
{
    $_monthsList = array(".01." => "января", ".02." => "февраля",
        ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня",
        ".07." => "июля", ".08." => "августа", ".09." => "сентября",
        ".10." => "октября", ".11." => "ноября", ".12." => "декабря");


    $currentDate = date("d.m.Y");

    $_mD = date(".m."); //для замены
    return str_replace($_mD, " " . $_monthsList[$_mD] . " ", $currentDate);
}
