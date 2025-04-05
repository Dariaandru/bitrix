<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статистика");
?>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Redirect to the dashboard page
LocalRedirect("/s2/statistic_na/dashboard/");
die();
?>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>