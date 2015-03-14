<?php

/**
 * Class Divante_LiveEditor_Service_Cms_Page
 */
class Divante_LiveEditor_Service_Cms_Page
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
{
    use Divante_LiveEdit_Service_MetadataAdapter_ProcessTrait;

    /**
     * @return Mage_Cms_Model_Page
     *
     * @TODO add magento 2 support
*/
    public function getModel()
    {
        return Mage::getModel('cms/page');
    }

}