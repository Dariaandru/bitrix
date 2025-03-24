<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

// Make sure user properties are enabled
$arResult["USER_PROPERTIES"]["SHOW"] = "Y";

// Add our custom field if it's not already in the list
if (!isset($arResult["USER_PROPERTIES"]["DATA"]["UF_USER_TYPE"])) {
    $userFields = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("USER", 0, LANGUAGE_ID);
    
    if (isset($userFields["UF_USER_TYPE"])) {
        $arResult["USER_PROPERTIES"]["DATA"]["UF_USER_TYPE"] = $userFields["UF_USER_TYPE"];
    }
}
