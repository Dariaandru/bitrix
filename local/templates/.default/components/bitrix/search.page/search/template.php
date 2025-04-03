<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>


		<!-- Search Posts Section -->
		<section id="blog-posts" class="blog-posts section">
			<div class="container">

				<div class="row gy-4">
					<div class="search-widget widget-item">
						<form action="" method="get">
							<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />
							<button type="submit" title="Search"><i class="bi bi-search"></i></button>
							<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
						</form>
					</div>
				</div>

				<div class="row gy-4">


	<?foreach($arResult["SEARCH"] as $arItem):?>

					<div class="col-lg-4">
						<article>
							<div class="card-body">
								<h5 class="card-title"><a href="<?=$arItem["URL"]?>"><?=$arItem["TITLE"]?></a></h5>
								<h6 class="card-subtitle mb-2 text-muted"><?=$arItem["FULL_DATE_CHANGE"]?></h6>
								<p class="card-text"><?=$arItem["BODY_FORMATED"]?></p>
							</div>
						</article>
					</div><!-- End list item -->
		<?endforeach;?>
					
					
					<!-- BOTTOM_PAGER HERE  -->
				<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N"): echo $arResult["NAV_STRING"]?>
					<br />
					<p>
					<?if($arResult["REQUEST"]["HOW"]=="d"):?>
						<a href="<?=$arResult["URL"]?>&amp;how=r<?echo $arResult["REQUEST"]["FROM"]? '&amp;from='.$arResult["REQUEST"]["FROM"]: ''?><?echo $arResult["REQUEST"]["TO"]? '&amp;to='.$arResult["REQUEST"]["TO"]: ''?>"><?=GetMessage("SEARCH_SORT_BY_RANK")?></a>&nbsp;|&nbsp;<b><?=GetMessage("SEARCH_SORTED_BY_DATE")?></b>
					
					<?endif;?>
					</p>
				<?else:?>
					<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
				<?endif;?>

				</div>
			</div>
		</section><!-- /Search Posts Section -->




