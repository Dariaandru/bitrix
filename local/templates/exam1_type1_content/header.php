<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>

<?require_once($_SERVER["DOCUMENT_ROOT"] . "/local/templates/.default/include/header.php");?>

<main class="main">

<!-- Conten Page Section -->
<section class="content-page section">

    <div class="container">
        <div class="row gy-5">

            <div class="col-lg-4">

                <div class="service-box">
                    <div class="services-list">
                        <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Пункт меню 1</span></a>
                        <a href="#" class="active"><i class="bi bi-arrow-right-circle"></i><span>Пункт меню 2 -
                                активный</span></a>
                        <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Пункт меню 3</span></a>
                        <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Пункт меню 4</span></a>
                    </div>
                </div>

                <div class="service-box">
                    <h4>Материалы</h4>
                    <div class="download-catalog">
                        <a href="#"><i class="bi bi-filetype-pdf"></i><span>Скачать PDF</span></a>
                        <a href="#"><i class="bi bi-file-earmark-word"></i><span>Скачать DOC</span></a>
                    </div>
                </div>

                <div class="help-box d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-headset help-icon"></i>
                    <h4>Вопросы?</h4>
                    <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+7 000
                            000 00 00</span></p>
                    <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a
                            href="mailto:contact@example.com">contact@company.ru</a></p>
                </div>

            </div>

            <div class="col-lg-8 ps-lg-5">

                <!-- Content Page Title -->
                <div class="page-content-title">
                    <div class="position-relative">
                        <h1><?$APPLICATION->ShowTitle();?></h1>
                        <p><?=$APPLICATION->ShowProperty("page_text_under_title");?>
                        </p>
                        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "bread", Array(
                        "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                            "SITE_ID" => "s2",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                            "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                        ),
                        false
                        );?>
                    </div>
                </div>
                <!-- End Content Page Title -->