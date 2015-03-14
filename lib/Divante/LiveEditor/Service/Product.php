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


}