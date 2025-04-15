
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
$this->setFrameMode(true); 


?>


<!-- Portfolio Sections -->
<section class="portfolio-sections section">
	<div class="container">
		<div class="row gy-4">

		<?foreach ($arResult['SECTIONS'] as &$arSection):?>
			<div class="col-lg-6">
				<div class="service-item position-relative">
					<?$file = CFile::ResizeImageGet(
						$arSection['PICTURE'], 
						array('width' => $arSection['PICTURE']['WIDTH'], 
							'height' => $arSection['PICTURE']['HEIGHT']), 
							BX_RESIZE_IMAGE_PROPORTIONAL, true
					);?>
					<div class="img">
						<img src="<?=$file["src"]?>" class="img-fluid" alt="">
					</div>
					<div class="details">
						<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
							<?=$arSection['NAME']?>
						</a>
						<p><?=$arSection['DESCRIPTION']?></p>
					</div>
				</div>
			</div><!-- End Service Item -->
		<?endforeach;?>
		</div>
	</div>
</section><!-- /Portfolio Sections Section -->
