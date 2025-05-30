<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>


	<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">
<?

$previousLevel = 0;
foreach($arResult as $arItem):?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif;?>


	<?if ($arItem["PERMISSION"] > "D"):?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["SELECTED"]):?>

			<li class="nav-item"><a href="<?=$arItem["LINK"]?> " class="nav-link" data-bs-target="#<?=$arItem["PARAMS"]["id"]?>" data-bs-toggle="collapse" aria-expanded="true">
			<i class="bi <?=$arItem["PARAMS"]["menu_ico"]?>"></i>
			<span><?=$arItem["TEXT"]?></span>
			<i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="<?=$arItem["PARAMS"]["id"]?>" class="nav-content collapse show" data-bs-parent="#sidebar-nav">


		<?else:?>

			<li class="nav-item"><a href="<?=$arItem["LINK"]?> " class="nav-link collapsed" data-bs-target="#<?=$arItem["PARAMS"]["id"]?>" data-bs-toggle="collapse" aria-expanded="false">
				<i class="bi <?=$arItem["PARAMS"]["menu_ico"]?>"></i>
				<span><?=$arItem["TEXT"]?></span>
				<i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="<?=$arItem["PARAMS"]["id"]?>" class="nav-content collapse " data-bs-parent="#sidebar-nav">

		<?endif;?>
	<?else:?>
		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="nav-item">
			<a class="nav-link" href="<?=$arItem["LINK"]?>">
			<i class="bi <?=$arItem["PARAMS"]["menu_ico"]?>"></i>
			<span><?=$arItem["TEXT"]?></span>
		</a></li>

		<?else:?>
			<li>
			<a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="active"<?endif;?>>
			<i class="bi bi-circle"></i>
			<span><?=$arItem["TEXT"]?></span>
		</a></li>

		<?endif;?>


	<?endif;?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>

</aside><!-- End Sidebar-->