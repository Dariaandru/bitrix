<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Агенты");
?><?$APPLICATION->IncludeComponent(
	"mcart:agents.list", 
	"agents", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"ELEMENTS_COUNT" => "1",
		"HLBLOCK_TNAME" => "Agents",
		"COMPONENT_TEMPLATE" => "agents",
		"DISPLAY_BOTTOM_PAGER" => "Y"
	),
	false
);


?>






<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>