<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Don't show pagination if there's only one page
if(!$arResult["NavShowAlways"])
{
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div class="row">
    <div class="col-md-12 text-center">
        <div class="site-pagination">
            <?php
            // Calculate which pages to show
            $totalPages = $arResult["NavPageCount"];
            $currentPage = $arResult["NavPageNomer"];
            
            // Show first 5 pages, then ellipsis, then last page
            $pagesToShow = 5;
            
            for ($i = 1; $i <= min($pagesToShow, $totalPages); $i++) {
                if ($i == $currentPage) {
                    ?><a href="#" class="active"><?=$i?></a><?
                } else {
                    ?><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$i?>"><?=$i?></a><?
                }
            }
            
            // Show ellipsis if there are more pages
            if ($totalPages > $pagesToShow) {
                ?><span>...</span><?
                
                // Show the last page
                if ($currentPage > $pagesToShow && $currentPage < $totalPages) {
                    // Current page is beyond the first 5 and not the last page
                    ?><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$totalPages?>"><?=$totalPages?></a><?
                } else if ($currentPage <= $pagesToShow) {
                    // Current page is among the first 5
                    ?><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$totalPages?>"><?=$totalPages?></a><?
                } else {
                    // Current page is the last page
                    ?><a href="#" class="active"><?=$totalPages?></a><?
                }
            }
            ?>
        </div>
    </div>
</div>
