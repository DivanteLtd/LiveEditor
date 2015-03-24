<?php

/**
 * Class Divante_LiveEditor_Service_Content_Adapter_Abstract
 */
abstract class Divante_LiveEditor_Service_Content_Adapter_Abstract
{

    /**
     * @return Divante_LiveEditor_Service_Content_Adapter_DescriptionMapperAbstract
     */
    public function getDescriptionMapper()
    {

        return Divante_LiveEditor_LiveEditor::getInstance()->getVersion() == 1
            ? new Divante_LiveEditor_Service_Content_Adapter_Magento1_DescriptionMapper()
            : new Divante_LiveEditor_Service_Content_Adapter_Magento2_DescriptionMapper();

    }

}