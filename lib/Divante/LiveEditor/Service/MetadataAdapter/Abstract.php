<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 22:25
 */
abstract class Divante_LiveEditor_Service_MetadataAdapter_Abstract
{
    /**
     * @return Divante_LiveEdit_Service_MetadataAdapter_StatusMapperAbstract
     */
    public function getStatusMapper()
    {
        return Divante_LiveEditor_LiveEditor::getInstance()->getVersion() == 1
            ? new Divante_LiveEditor_Service_MetadataAdapter_Magento1_StatusMapper()
            : new Divante_LiveEditor_Service_MetadataAdapter_Magento2_StatusMapper();
    }
}