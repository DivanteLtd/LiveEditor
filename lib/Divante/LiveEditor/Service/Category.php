<?php

/**
 * Class Divante_LiveEditor_Service_Category
 */
class Divante_LiveEditor_Service_Category
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
{
    /**
     * @return Mage_Catalog_Model_Category
     */
    public function getModel()
    {
        return Mage::getModel('catalog/category');
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
     * @param int $categoryId
     *
     * @return string
     */
    public function getUrlKey($categoryId)
    {
        $this->load($categoryId);

        return $this->getLoadedModel()->getUrlKey();
    }

    /**
     * @TODO differentiate between magento 1.x and magento 2.x
     *
     * @param string $url
     * @param int $categoryId
     */
    public function saveUrlKey($url, $categoryId)
    {
        $this->load($categoryId);
        $this->getLoadedModel()->setUrlKey($url);
        $this->getLoadedModel()->save();

        $this->_reindexCatalogUrl();
    }
}