<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

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

/*
* Для постраничной навигации использовать компонент bitrix:main.pagenavigation
*/
?>


<div class="site-section site-section-sm bg-light">
      <div class="container agents-list">
        <div class="row mb-5">
          <div class="col-12">
            <div class="site-section-title">
              <h2>Агенты по Недвижимости</h2>
            </div>
          </div>
        </div>
        <div class="mb-5">
<?foreach ($arResult['AGENTS']['ITEMS'] as $arItem):?>

            <div class="agent__card">
                <div class="small-info">
                  <?if($arItem["UF_PHOTO"]):?>
                    <div class="avatar" style="background-image: url(<?=$arItem["UF_PHOTO_SRC"]?>);"></div>
                    <?else:?>
                    <div class="avatar" style="background-image: url(<?=SITE_TEMPLATE_PATH . "/components/mcart/agents.list/agents/images/no-avatar.png"?>);"></div>
                    <?endif?>
                    <div class="info">
                        <div class="name"><?=$arItem["UF_FULL_NAME"]?>
                        </div>
                    </div>
                </div>
                <div class="agent__card_item">
                    <div class="agent__card_info">
                        <div class="card__info_item">
                            <div class="position">Электронная почта: </div>
                            <div class="name"><?=$arItem["UF_EMAIL"]?>
                            </div>
                        </div>
                        <div class="card__info_item">
                            <div class="position">Телефон: </div>
                            <div class="name"><?=$arItem["UF_PHONE"]?>
                            </div>
                        </div>
                        <div class="card__info_item">
                            <div class="position">Вид деятельности:</div>
                            <div class="name"><?=$arItem["UF_ACTIVITY"]?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="star" dataset="<?=$arItem['ID']?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4L14.472 9.26604L20 10.1157L16 14.2124L16.944 20L12 17.266L7.056 20L8 14.2124L4 10.1157L9.528 9.26604L12 4Z" stroke="#95929A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>
<?endforeach?>
        </div>
        
        <!-- <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>  
        </div> -->

        <?
$APPLICATION->IncludeComponent(
    "bitrix:main.pagenavigation",
    "nav",
    Array(
        "NAV_OBJECT" => $arResult["AGENTS"]["NAV_OBJECT"],
        "SEF_MODE" => "N",
        "SHOW_ALWAYS" => "Y",
    ),
    false
);

?>
        
      </div>
    </div>