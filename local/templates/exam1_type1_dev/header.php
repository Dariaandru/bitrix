<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<?define("DEFAULT_TEMPLATE_PATH", '/local/templates/.default');?>
<?require_once($_SERVER["DOCUMENT_ROOT"] . DEFAULT_TEMPLATE_PATH . "/include/header.php");?>
<?
use Bitrix\Main\Application; 
$page = Application::getInstance()->getContext()->getRequest()->getRequestedPageDirectory();


if ($page !== '/s2/'):
?>



<!-- Page Title -->
<div class="page-title dark-background">
    <div class="container position-relative">
        <h1><?$APPLICATION->ShowTitle(false);?></h1>
        <p><?=$APPLICATION->ShowProperty("page_text_under_title");?></p>
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "bread-dev", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s2",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>
    </div>
</div><!-- End Page Title -->

<?endif;?>