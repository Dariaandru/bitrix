<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>

<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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
  <!-- to delete -->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
  <!-- to delete -->

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Статистика</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        
        <!-- ----------------------------------------------------------------------------- -->

        <!-- <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Ivanov</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Ivanov</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.html">
                <i class="bi bi-person"></i>
                <span>Мой профиль</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <div class="col-12 mb-3 mt-3 d-flex justify-content-center">
                <button 
                  class="btn btn-secondary btn-sm"
                  type="submit"
                  name="logout_butt"
                  value="Выйти"   
                >
                  Выйти
                </button>
              </div>
            </li> -->

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile -->
        <?$APPLICATION->IncludeComponent(
            "bitrix:system.auth.form",
            "form",
            Array(
              "FORGOT_PASSWORD_URL" => "",
              "PROFILE_URL" => "/s2/statistic_na/profile/",
              "REGISTER_URL" => "",
              "SHOW_ERRORS" => "N"
            )
        );?>
<!-- ------------------------------------------------------------------------------------ -->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->

  <aside id="sidebar" class="sidebar">
  <?$APPLICATION->IncludeComponent("bitrix:menu", "menu", Array(
	"ALLOW_MULTI_SELECT" => "Y",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "st_second",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "st_first",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>

 

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle mb-4">
      <h1><?=$APPLICATION->ShowTitle(false)?></h1>
    </div><!-- End Page Title -->


    
    <section class="section <?=$APPLICATION->ShowProperty('page_css_class')?>">