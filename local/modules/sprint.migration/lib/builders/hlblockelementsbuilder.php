<?php

namespace Sprint\Migration\Builders;

use Sprint\Migration\Exceptions\HelperException;
use Sprint\Migration\Exceptions\MigrationException;
use Sprint\Migration\Exceptions\RebuildException;
use Sprint\Migration\Exceptions\RestartException;
use Sprint\Migration\Exchange\HlblockElementsExport;
use Sprint\Migration\Locale;
use Sprint\Migration\Module;
use Sprint\Migration\VersionBuilder;

class HlblockElementsBuilder extends VersionBuilder
{
    /**
     * @return bool
     */
    protected function isBuilderEnabled()
    {
        return (!Locale::isWin1251() && $this->getHelperManager()->Hlblock()->isEnabled());
    }

    protected function initialize()
    {
        $this->setTitle(Locale::getMessage('BUILDER_HlblockElementsExport1'));
        $this->setDescription(Locale::getMessage('BUILDER_HlblockElementsExport2'));
        $this->setGroup(Locale::getMessage('BUILDER_GROUP_Hlblock'));

        $this->addVersionFields();
    }

    /**
     * @throws MigrationException
     * @throws HelperException
     * @throws RebuildException
     * @throws RestartException
     */
    protected function execute()
    {
        $hlblockId = $this->addFieldAndReturn(
            'hlblock_id',
            [
                'title'       => Locale::getMessage('BUILDER_HlblockElementsExport_HlblockId'),
                'placeholder' => '',
                'width'       => 250,
                'select'      => $this->getHelperManager()->HlblockExchange()->getHlblocksStructure(),
            ]
        );

        $fields = $this->getHelperManager()->HlblockExchange()->getHlblockFieldsCodes($hlblockId);
        $updateMode = $this->getFieldValueUpdateMode($fields);

        $this->getExchangeManager()
             ->HlblockElementsExport()
             ->setLimit(20)
             ->setUpdateMode($updateMode)
             ->setExportFields($fields)
             ->setHlblockId($hlblockId)
             ->setExchangeFile(
                 $this->getVersionResourceFile(
                     $this->getVersionName(),
                     'hlblock_elements.xml'
                 )
             )->execute();

        $this->createVersionFile(
            Module::getModuleDir() . '/templates/HlblockElementsExport.php',
            [
                'updateMode' => $updateMode,
            ]
        );
    }

    /**
     * @param array $fields Available fields in the Hlblock
     * @throws RebuildException
     * @return string
     */
    protected function getFieldValueUpdateMode($fields = [])
    {
        $selectOptions = [
            [
                'title' => Locale::getMessage('BUILDER_IblockElementsExport_NotUpdate'),
                'value' => HlblockElementsExport::UPDATE_MODE_NOT,
            ]
        ];
        
        // Only add XML_ID update option if the field exists
        if (in_array('UF_XML_ID', $fields)) {
            $selectOptions[] = [
                'title' => Locale::getMessage('BUILDER_IblockElementsExport_UpdateByXmlId'),
                'value' => HlblockElementsExport::UPDATE_MODE_XML_ID,
            ];
        }

        return $this->addFieldAndReturn(
            'update_mode', [
                'title'       => Locale::getMessage('BUILDER_IblockElementsExport_UpdateMode'),
                'placeholder' => '',
                'width'       => 250,
                'select'      => $selectOptions,
            ]
        );
    }


    /**
 * Rollback the migration by removing imported Highload block elements
 * 
 * @throws MigrationException
 * @throws HelperException
 * @return bool
 */
public function down()
{
    $hlblockId = $this->getHlblockId();
    if (!$hlblockId) {
        throw new MigrationException('Hlblock ID not specified for rollback');
    }

    $exchangeFile = $this->getExchangeFile();
    if (!file_exists($exchangeFile)) {
        throw new MigrationException('Exchange file not found for rollback');
    }

    // Get elements from the exchange file
    $elements = $this->getExchangeManager()
        ->HlblockElementsImport()
        ->getElementsFromFile($exchangeFile);

    if (empty($elements)) {
        $this->outInfo('No elements found for deletion');
        return true;
    }

    $hlblockHelper = $this->getHelperManager()->Hlblock();
    $hlblock = $hlblockHelper->getHlblock($hlblockId);
    
    if (!$hlblock) {
        throw new MigrationException("Hlblock with ID {$hlblockId} not found");
    }

    $entityDataClass = $hlblockHelper->getEntityDataClass($hlblock);
    $deleted = 0;

    foreach ($elements as $element) {
        if (!empty($element['UF_XML_ID'])) {
            $filter = ['=UF_XML_ID' => $element['UF_XML_ID']];
            $item = $entityDataClass::getList(['filter' => $filter])->fetch();
            
            if ($item) {
                $result = $entityDataClass::delete($item['ID']);
                if ($result->isSuccess()) {
                    $deleted++;
                } else {
                    $this->outError('Error deleting element with XML_ID: ' . $element['UF_XML_ID']);
                }
            }
        }
    }

    $this->outInfo("Deleted {$deleted} elements from Hlblock {$hlblock['NAME']}");
    return true;
}

/**
 * Get the Hlblock ID from the migration data
 * 
 * @return int|null
 */
protected function getHlblockId()
{
    return $this->getParam('hlblock_id');
}

/**
 * Get the exchange file path
 * 
 * @return string
 */
protected function getExchangeFile()
{
    return $this->getVersionResourceFile(
        $this->getVersionName(),
        'hlblock_elements.xml'
    );
}




}
