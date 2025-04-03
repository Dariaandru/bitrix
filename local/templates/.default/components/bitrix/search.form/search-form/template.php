<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<h4><?=GetMessage('SEARCH_FORM_TITLE')?></h4>
<form action="<?=$arResult["FORM_ACTION"]?>" method="get">
	<div class="search-form">
		<input class="input-seach" type="text" name="q">
		<input class="button-seach" name="s" type="submit" value="<?=GetMessage('BUTTON_TITLE')?>">
	</div>
</form>

