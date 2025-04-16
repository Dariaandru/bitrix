<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>

<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$APPLICATION->ShowTitle()?></title>

  <?$APPLICATION->ShowHead();?>
  <!-- Favicons -->
  <link href="<?=SITE_TEMPLATE_PATH?>/assets/img/favicon.png" rel="icon">

  <?

  use Bitrix\Main\Page\Asset;

  Asset::getInstance()->AddCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/css/bootstrap.min.css");
  Asset::getInstance()->AddCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap-icons/bootstrap-icons.css");
  Asset::getInstance()->AddCss(SITE_TEMPLATE_PATH . "/assets/css/style.css");
  
  ?>

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.html" class="logo d-flex align-items-center">
        <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Статистика</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile -->
        <?$APPLICATION->IncludeComponent(
            "bitrix:system.auth.form",
            "form",
            Array(
              "FORGOT_PASSWORD_URL" => "/s2/statistic_na/forgot_password.php/",
              "PROFILE_URL" => "/s2/statistic_na/profile/",
              "REGISTER_URL" => "/s2/statistic_na/register.php/",
              "SHOW_ERRORS" => "N"
            )
        );?>
<!-- ------------------------------------------------------------------------------------ -->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->


  <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu", 
	array(
		"ALLOW_MULTI_SELECT" => "Y",
		"CHILD_MENU_TYPE" => "st_second",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "st_first",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "menu"
	),
	false
);?>

 



  <main id="main" class="main">

    <div class="pagetitle mb-4">
      <h1><?=$APPLICATION->ShowTitle(false)?></h1>
    </div><!-- End Page Title -->


    
    <section class="section <?=$APPLICATION->ShowProperty('page_css_class')?>">