<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use \Bitrix\Main\EventManager;
$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->AddEventHandler("main", "OnAfterUserRegister", ["UserRegistrationHandler", "onAfterUserRegister"]);
/**
 * Класс для обработки событий, связанных с регистрацией пользователей
 */
class UserRegistrationHandler
{
    /**
     * Обработчик события после регистрации пользователя
     * Добавляет пользователя в соответствующую группу в зависимости от выбранного типа
     * 
     * @param array $arFields Массив полей пользователя
     * @return void
     */
    public static function onAfterUserRegister(&$arFields)
    {
        // Проверяем, успешно ли прошла регистрация
        if ($arFields["USER_ID"] > 0) {
            // Получаем ID пользователя
            $userId = $arFields["USER_ID"];
            
            // Получаем значение пользовательского поля UF_USER_TYPE
            $userType = "";
            $rsUser = CUser::GetByID($userId);
            if ($arUser = $rsUser->Fetch()) {
                $userType = $arUser["UF_USER_TYPE"];
            }
            
            // Определяем группу в зависимости от типа пользователя
            $buyerGroupId = 6;  // ID группы "Покупатели" (замените на реальный ID)
            $sellerGroupId = 7; // ID группы "Продавцы" (замените на реальный ID)
            
            // Текущие группы пользователя
            $userGroups = CUser::GetUserGroup($userId);
            
            // Добавляем пользователя в соответствующую группу
            if ($userType == "5") {
                if (!in_array($buyerGroupId, $userGroups)) {
                    $userGroups[] = $buyerGroupId;
                }
            } elseif ($userType == "6") {
                if (!in_array($sellerGroupId, $userGroups)) {
                    $userGroups[] = $sellerGroupId;
                }
            }
            
            // Обновляем группы пользователя
            CUser::SetUserGroup($userId, $userGroups);
            
        }
    }
}






