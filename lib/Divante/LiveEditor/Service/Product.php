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
     * @return string
     */
    public function getAdminUrl()
    {
        $secretKey = Divante_LiveEditor_LiveEditor::getInstance()->getAdminSecretKey('catalog_category', 'index');

        return Mage::helper("adminhtml")
            ->getUrl("adminhtml/catalog_product/edit", array(
                'id' => $this->getLoadedModel()->getId(),
                'key' => $secretKey
            ));
    }
}