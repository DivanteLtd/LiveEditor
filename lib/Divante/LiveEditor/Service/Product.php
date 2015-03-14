<?php

/**
 * Class Divante_LiveEditor_Service_Product
 */
class Divante_LiveEditor_Service_Product
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
{
    /**
     * @return Mage_Catalog_Model_Product
     *
     */
    public function getModel()
    {
        return Mage::getModel('catalog/product');
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
     * @param int $productId
     *
     * @return string
     */
    public function getUrlKey($productId)
    {
        $this->load($productId);

        return $this->getLoadedModel()->getUrlKey();
    }

    /**
     * @TODO differentiate between magento 1.x and magento 2.x
     *
     * @param string $url
     * @param int $productId
     */
    public function saveUrlKey($url, $productId)
    {
        $this->load($productId);
        $this->getLoadedModel()->setUrlKey($url);

        $this->getLoadedModel()->save();

        $this->_reindexCatalogUrl();
    }
}