<?php

/**
 * Class Divante_LiveEditor_Service_Cms_Page
 */
class Divante_LiveEditor_Service_Cms_Page
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
{
    /**
     * @return Mage_Cms_Model_Page
*/
    public function getModel()
    {
        return Mage::getModel('cms/page');
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        // TODO: Implement getMetaDescription() method.
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        // TODO: Implement getMetaKeywords() method.
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        // TODO: Implement getMetaTitle() method.
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