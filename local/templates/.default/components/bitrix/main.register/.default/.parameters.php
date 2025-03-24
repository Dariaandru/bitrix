<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arTemplateParameters = array(
	"USER_PROPERTY_NAME"=>array(
		"NAME" => GetMessage("USER_PROPERTY_NAME"),
		"TYPE" => "STRING",
		"DEFAULT" => "",	
	),
);

$arResult["USER_PROPERTIES"]["DATA"]["UF_USER_TYPE"] = array(
	"EDIT_FORM_LABEL" => "Тип пользователя",
    "IS_REQUIRED" => "Y",
    "DEFAULT_VALUE" => "",
    "USER_TYPE" => array("USER_TYPE_ID" => "enumeration"),
    "ENUM" => array(
		"buyer" => "Покупатель",
        "seller" => "Продавец"
		)
		);
		
?>