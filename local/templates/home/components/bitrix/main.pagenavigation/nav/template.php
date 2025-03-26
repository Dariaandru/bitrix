<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

/** @var PageNavigationComponent $component */
$component = $this->getComponent();

$this->setFrameMode(true);
?>

<div class="row">
    <div class="col-md-12 text-center">
        <div class="site-pagination">
            <?for($page = 1; $page <= $arResult["PAGE_COUNT"]; $page++):?>
                <?if ($page == $arResult["CURRENT_PAGE"]):?>
                    <a href="#" class="active"><?=$page?></a>
                <?else:?>
                    <a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($page))?>"><?=$page?></a>
                <?endif?>
            <?endfor;?>
        </div>
    </div>
</div>
