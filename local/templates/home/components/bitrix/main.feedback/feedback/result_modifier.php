<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

// Сохраняем значение поля SUBJECT при ошибке валидации
if (isset($_REQUEST["SUBJECT"])) {
    $arResult["SUBJECT"] = htmlspecialcharsbx($_REQUEST["SUBJECT"]);
}
