<?php
/**
 * Class Divante_LiveEditor_Service_Product
 */
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

}