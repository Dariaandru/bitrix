<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = [
    "GROUPS" => [
        "SETTINGS" => [
            "NAME" => GetMessage("MCART_AGENTS_LIST_SETTINGS_GROUP"),
            "SORT" => 100,
        ],
    ],
    "PARAMETERS" => [
        
        "HLBLOCK_TNAME" => [
            "PARENT" => "SETTINGS",
            "NAME" => GetMessage("MCART_AGENTS_LIST_HLBLOCK_TNAME"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ],
        "ELEMENTS_COUNT" => [
            "PARENT" => "SETTINGS",
            "NAME" => GetMessage("MCART_AGENTS_LIST_ELEMENTS_COUNT"),
            "TYPE" => "STRING",
            "DEFAULT" => "1",
        ],
        "CACHE_TIME" => [
            "DEFAULT" => 3600
        ],
    ]
];
