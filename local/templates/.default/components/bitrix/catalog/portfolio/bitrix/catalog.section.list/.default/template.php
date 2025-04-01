
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>

<!-- Portfolio Sections -->
<section class="portfolio-sections section">
	<div class="container">
		<div class="row gy-4">
			<?
				$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);			
			?>
		<?foreach ($arResult['SECTIONS'] as &$arSection):?>
			<div class="col-lg-6">
				<div class="service-item position-relative">
					<div class="img">
						<img src="<?=$arSection["PICTURE"]["SRC"]?>" class="img-fluid" alt="">
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
