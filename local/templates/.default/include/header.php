<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>


<?require_once($_SERVER["DOCUMENT_ROOT"] . "/local/templates/.default/include/boot.php");?>
<?define("DEFAULT_TEMPLATE_PATH", '/local/templates/.default');?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Компания - шаблон контентной страницы</title>
	<?$APPLICATION->ShowHead();?>

	<?
	 use Bitrix\Main\Page\Asset;
  
	 Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/vendor/bootstrap/css/bootstrap.min.css");
	 Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/vendor/bootstrap-icons/bootstrap-icons.css");
	 Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/vendor/aos/aos.css");
	 Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/main.css");
	 Asset::getInstance()->addCss(DEFAULT_TEMPLATE_PATH . "/assets/img/favicon.png");
	
	?>

	<link href="<?=DEFAULT_TEMPLATE_PATH?>/assets/img/favicon.png" rel="icon">
	<link href="<?=DEFAULT_TEMPLATE_PATH?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

</head>

<body class="scrolled">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

	<header id="header" class="header d-flex align-items-center">
		<div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

			<a href="#" class="logo d-flex align-items-center">
				<h1 class="sitename"><?=GetMessage('COMPANY_NAME')?></h1>
			</a>

			<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
	"ALLOW_MULTI_SELECT" => "Y",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "3",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>

		</div>
	</header>

	<main class="main">