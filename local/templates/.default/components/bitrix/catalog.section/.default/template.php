<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */



$this->setFrameMode(true); ?>
<?
$APPLICATION->SetPageProperty("title", $arResult["NAME"]);
$APPLICATION->SetTitle($arResult["NAME"]);

?>


		<!-- Portfolio List Section -->
		<section class="portfolio section">

			<div class="container">
				<div class="row gy-4">
				<?foreach ($arResult['ITEMS'] as $item):?>

					<div class="col-lg-4">
						<article>
							<div class="post-img">
								<img src="<?=$item["DETAIL_PICTURE"]["SRC"]?>" alt="" class="img-fluid">
							</div>
							<div class="card-body">
								<h5 class="title"><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></h5>
								<p class="card-text"><?=$item["PREVIEW_TEXT"]?></p>
							</div>
						</article>
					</div><!-- End list item -->
				<?endforeach;?>
							
				</div>

			</div><!-- End Portfolio Container -->

		</section><!-- /Portfolio List Section -->
