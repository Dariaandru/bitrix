<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>


<div class="service-box">
	<div class="services-list">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<? $iconClass = isset($arItem["PARAMS"]["menu_ico"]) ? $arItem["PARAMS"]["menu_ico"] : "bi-arrow-right-circle"; ?>
	<?if($arItem["SELECTED"]):?>
		<a href="<?=$arItem["LINK"]?>" class="active"><i class="<?=$iconClass?>"></i><span><?=$arItem["TEXT"]?></span></a>
	<?else:?>
		<a href="<?=$arItem["LINK"]?>"><i class="<?=$iconClass?>"></i><span><?=$arItem["TEXT"]?></span></a>
	<?endif?>
	
<?endforeach?>

</div>
</div>
<?endif?>