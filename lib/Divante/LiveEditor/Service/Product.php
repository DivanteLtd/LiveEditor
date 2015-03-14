<?php

/**
 * Class Divante_LiveEditor_Service_Product
 */
include_once 'MetadataAdapter/ProcessTrait.php';

class Divante_LiveEditor_Service_Product
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
{
    use Divante_LiveEdit_Service_MetadataAdapter_ProcessTrait;

    /**
     * @return Mage_Catalog_Model_Product
     *
     * @TODO add magento 2 support
     *
     */
    public function getModel()
    {
        return Mage::getModel('catalog/product');
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
    public function setUrlKey($url)
    {
        $this->getLoadedModel()->setUrlKey($url);
    }
}