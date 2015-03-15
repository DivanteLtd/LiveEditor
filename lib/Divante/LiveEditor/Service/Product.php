<?php

/**
 * Class Divante_LiveEditor_Service_Product
 */
include_once 'MetadataAdapter/ProcessTrait.php';
include_once 'Content/Adapter/ProcessTrait.php';

class Divante_LiveEditor_Service_Product
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface, Divante_LiveEditor_Service_Content_Interface
{
    use Divante_LiveEdit_Service_MetadataAdapter_ProcessTrait;
    use Divante_LiveEdit_Service_Content_Adapter_ProcessTrait;

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
        return Mage::helper("adminhtml")
            ->getUrl("adminhtml/catalog_product/edit", array('id' => $this->getLoadedModel()->getId()));
    }
}