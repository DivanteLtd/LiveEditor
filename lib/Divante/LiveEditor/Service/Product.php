<?php
/**
 * Class Divante_LiveEditor_Service_Product
 */
class Divante_LiveEditor_Service_Product extends Divante_LiveEditor_Service_Abstract
{
    /**
     * @return Mage_Catalog_Model_Product
     *
     */
    public function getModel()
    {
        return Mage::getModel('catalog/product');
    }

}