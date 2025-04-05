<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "«Проминжиниринг, Инженерные услуги");
$APPLICATION->SetPageProperty("description", "«Добро пожаловать на сайт компании, лидера в области проминжиниринга");
$APPLICATION->SetTitle("Главная");
?>




<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/templates/.default/include/main/hero.php"
	)
);?>


<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/templates/.default/include/main/featured-services.php"
	)
);?>


<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/templates/.default/include/main/about.php"
	)
);?>


</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>