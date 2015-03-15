<?php

/**
 * Class Divante_LiveEditor_Service_Cms_Page
 */
include_once dirname(__FILE__) . '/../MetadataAdapter/ProcessTrait.php';
include_once dirname(__FILE__) . '/../Content/Adapter/ProcessTrait.php';

class Divante_LiveEditor_Service_Cms_Page
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface, Divante_LiveEditor_Service_Content_Interface
{
    use Divante_LiveEdit_Service_MetadataAdapter_ProcessTrait;
    use Divante_LiveEdit_Service_Content_Adapter_ProcessTrait;

    /**
     * @return Mage_Cms_Model_Page
     *
     * @TODO add magento 2 support
     */
    public function getModel()
    {
        return Mage::getModel('cms/page');
    }

    /**
     * @return string
     */
    public function getAdminUrl()
    {
        return Mage::helper("adminhtml")
            ->getUrl("adminhtml/cms_page/edit", array('page_id' => $this->getLoadedModel()->getId()));
    }

}