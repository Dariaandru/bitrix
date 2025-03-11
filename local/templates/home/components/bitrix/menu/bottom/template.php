<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<div class="row mb-5">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Navigations</h3>
            </div>
    <div class="col-md-6 col-lg-6">
        <ul class="list-unstyled">
        <?
        $itemCount = count($arResult);
        $halfCount = ceil($itemCount/2);
        
        for($i = 0; $i < $halfCount; $i++):?>
            <li>
                <a href="<?=$arResult[$i]["LINK"]?>" class="<?if ($arResult[$i]["SELECTED"]):?>active<?endif?>">
                    <?=$arResult[$i]["TEXT"]?>
                </a>
            </li>
        <?endfor;?>
        </ul>
    </div>
    
    <div class="col-md-6 col-lg-6">
        <ul class="list-unstyled">
        <?for($i = $halfCount; $i < $itemCount; $i++):?>
            <li>
                <a href="<?=$arResult[$i]["LINK"]?>" class="<?if ($arResult[$i]["SELECTED"]):?>active<?endif?>">
                    <?=$arResult[$i]["TEXT"]?>
                </a>
            </li>
        <?endfor;?>
        </ul>
    </div>
<?endif?>
</div>

