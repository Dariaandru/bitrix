<?php

use Bitrix\Main\Loader; 

Loader::includeModule("highloadblock"); 

use Bitrix\Main\EventManager;

$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('', 'AgentsOnAfterAdd', 'OnAfterAdd'); //где "Agents" название highload блока
$eventManager->addEventHandler('', 'AgentsOnAfterUpdate', 'OnAfterAdd'); //где "Agents" название highload блока
$eventManager->addEventHandler('', 'AgentsOnAfterDelete', 'OnAfterAdd'); //где "Agents" название highload блока

function OnAfterAdd(\Bitrix\Main\Entity\Event $event) {
        $entity = $event->getEntity();
        $tableName = $entity->getDBTableName();
        $GLOBALS['CACHE_MANAGER']->ClearByTag('hlblock_table_name_' . $tableName);
}

