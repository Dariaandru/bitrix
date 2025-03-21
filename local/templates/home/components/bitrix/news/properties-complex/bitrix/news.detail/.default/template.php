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





<div class="site-blocks-cover overlay" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage("DETAILS_HEADER")?></span>
            <h1 class="mb-2"><?=$arResult["NAME"]?></h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?=$arResult["DISPLAY_PROPERTIES"]['PRICE']["VALUE"]?></strong></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" style="margin-top: -150px;">
            <div class="mb-5">
              <div class="slide-one-item home-slider owl-carousel">
			  <?$limitedGallery = array_slice($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["FILE_VALUE"], 0, 3);?>
			  <?foreach($limitedGallery as $galleryImage):?>
    <div>
        <img src="<?=$galleryImage["SRC"]?>" alt="<?=$galleryImage["DESCRIPTION"] ?: "Image"?>" class="img-fluid">
    </div>

<?endforeach;?>
              </div>
            </div>
            
            <div class="bg-white">
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3">$<?=$arResult["DISPLAY_PROPERTIES"]['PRICE']["DISPLAY_VALUE"]?></strong>
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs"><?=GetMessage("DATE_UPDATE")?></span>
                    <span class="property-specs-number"><?=$arResult["FIELDS"]["TIMESTAMP_X"]?> <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs"><?=GetMessage("FLOORS")?>
                    </span>
                    <span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]['FLOORS']["DISPLAY_VALUE"]?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs"><?=GetMessage("SQUARE")?>
                    </span>
                    <span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]['SQUARE']["DISPLAY_VALUE"]?>m</span><sup>2</sup>
                    
                  </li>
                </ul>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("BATHROOMS")?>
                  </span>
                  <strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]['BATHROOMS']["DISPLAY_VALUE"]?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("GARAGE")?>
                  </span>
                  <strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]['GARAGE']["DISPLAY_VALUE"]?></strong>
                </div>
                <!-- <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                  <strong class="d-block">$520</strong>
                </div> -->
              </div>
              <h2 class="h4 text-black"><?=GetMessage("MORE_INFO")?>
              </h2>
			  <p><?=$arResult["DETAIL_TEXT"] ?></p>
              <div class="row mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3"><?=GetMessage("GALLERY")?>
                  </h2>
                </div>											
				<?foreach($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["FILE_VALUE"] as $galleryImage):?>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <a href="<?=$galleryImage["SRC"]?>" class="image-popup gal-item">
            <img src="<?=$galleryImage["SRC"]?>" alt="<?=$galleryImage["DESCRIPTION"] ?: "Gallery Image"?>" class="img-fluid">
        </a>
    </div>
<?endforeach;?>
              </div>
              <div class="row mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3"><?=GetMessage("MATERIALS")?>
                  </h2>
                </div>											
				<?foreach($arResult["DISPLAY_PROPERTIES"]["FILES"]["FILE_VALUE"] as $galleryImage):?>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <a href="<?=$galleryImage["SRC"]?>" class="image-popup gal-item">
            <img src="<?=$galleryImage["SRC"]?>" alt="<?=$galleryImage["DESCRIPTION"] ?: "Gallery Image"?>" class="img-fluid">
        </a>
    </div>
<?endforeach;?>
              </div>
              <div class="">
                <div class="">
                  <h2 class="h4 text-black mb-3"><?=GetMessage("LINKS")?>
                  </h2>
                </div>
                <div class="links">
                  <?foreach($arResult["DISPLAY_PROPERTIES"]['LINKS']['DISPLAY_VALUE'] as $galleryImage):?>
                  <a href=""><?=$galleryImage?></a>
          <?endforeach;?>
                </div>								
              </div>
            </div>
          </div>
          <div class="col-lg-4 pl-md-5">

            <div class="bg-white widget border rounded">

              <h3 class="h4 text-black widget-title mb-3"><?=GetMessage("CONTACT_AGENT")?>
              </h3>
              <form action="" class="form-contact-agent">
                <div class="form-group">
                  <label for="name"><?=GetMessage("NAME")?>
                  </label>
                  <input type="text" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email"><?=GetMessage("EMAIL")?>
                  </label>
                  <input type="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="phone"><?=GetMessage("PHONE")?>
                  </label>
                  <input type="text" id="phone" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                </div>
              </form>
            </div>

            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3"><?=GetMessage("PARAGRAPH")?>
              </h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
            </div>

          </div>
          
        </div>
      </div>
    </div>

    <? if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
          
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>

  <style>
p a {
  display: none;
}

.links {
  /* display: block; */
  display: flex;
  flex-direction: column;
}

  </style>


















