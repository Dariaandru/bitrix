<?
// Добавьте обработку поля SUBJECT в массив arFields
$arFields = Array(
    "AUTHOR" => $arParams["REQUIRED_FIELDS"] == "Y" && in_array("NAME", $arParams["REQUIRED_FIELDS"]) ? $arResult["AUTHOR_NAME"] : $arResult["AUTHOR_NAME"],
    "AUTHOR_EMAIL" => $arParams["REQUIRED_FIELDS"] == "Y" && in_array("EMAIL", $arParams["REQUIRED_FIELDS"]) ? $arResult["AUTHOR_EMAIL"] : $arResult["AUTHOR_EMAIL"],
    "EMAIL_TO" => $arParams["EMAIL_TO"],
    "SUBJECT" => $_POST["SUBJECT"], // Добавляем новое поле
    "TEXT" => $arResult["MESSAGE"],
);

?>