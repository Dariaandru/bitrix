<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = [
    "NAME" => GetMessage("MCART_AGENTS_LIST_NAME"),
    "DESCRIPTION" => GetMessage("MCART_AGENTS_LIST_DESCRIPTION"),
    "ICON" => "/images/icon.gif",
    "CACHE_PATH" => "Y",
    "SORT" => 10,
    "PATH" => [
        "ID" => "mcart",
        "NAME" => GetMessage("MCART_AGENTS_LIST_SECTION_NAME"),
    ],
];
