<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// Подключаем все файлы из директории include
$includeDir = __DIR__ . '/include/';
if (is_dir($includeDir)) {
    $files = scandir($includeDir);
    foreach ($files as $file) {
        if ($file != "." && $file != ".." && is_file($includeDir . $file) && strstr($file, '.php')) {
            require_once($includeDir . $file);
        }
    }
}

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/UserRegistrationHandler.php");