<?php

use Bitrix\Main\Loader; 

Loader::includeModule("highloadblock"); 

use Bitrix\Main\EventManager;

$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('', 'AgentsOnAfterAdd', 'OnAfterAdd'); //где "Agents" название highload блока
$eventManager->addEventHandler('', 'AgentsOnAfterUpdate', 'OnAfterUpdate'); //где "Agents" название highload блока
$eventManager->addEventHandler('', 'AgentsOnAfterDelete', 'OnAfterDelete'); //где "Agents" название highload блока

function OnAfterAdd(\Bitrix\Main\Entity\Event $event) {
        $entity = $event->getEntity();
        $tableName = $entity->getDBTableName();
        $taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();
        $taggedCache->clearByTag('hlblock_table_name_' . $tableName);
}

function OnAfterUpdate(\Bitrix\Main\Entity\Event $event) {
        $entity = $event->getEntity();
        $tableName = $entity->getDBTableName();
        $taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();
        $taggedCache->clearByTag('hlblock_table_name_' . $tableName);
}

function OnAfterDelete(\Bitrix\Main\Entity\Event $event) {
        $entity = $event->getEntity();
        $tableName = $entity->getDBTableName();
        $taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();
        $taggedCache->clearByTag('hlblock_table_name_' . $tableName);
}