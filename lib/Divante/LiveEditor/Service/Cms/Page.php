<?php

/**
 * Class Divante_LiveEditor_Service_Cms_Page
 */
include_once '../MetadataAdapter/ProcessTrait.php';

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

    /**
     * @TODO differentiate between magento 1.x and magento 2.x
     *
     * @param int $cmsPageId
     *
     * @return string
     */
    public function getUrlKey($cmsPageId)
    {
        $this->load($cmsPageId);

        return $this->getLoadedModel()->getIdentifier();
    }

    /**
     * @TODO differentiate between magento 1.x and magento 2.x
     *
     * @param string $url
     * @param int $cmsPageId
     */
    public function saveIdentifier($url, $cmsPageId)
    {
        $this->load($cmsPageId);
        $this->getLoadedModel()->setIdentifier($url);
        $this->getLoadedModel()->save();
    }

}