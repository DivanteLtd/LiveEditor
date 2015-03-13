<?php

/**
 * Class Divante_LiveEditor_Service_Category
 */
class Divante_LiveEditor_Service_Category extends Divante_LiveEditor_Service_Abstract
{
    /**
     * @return Mage_Catalog_Model_Category
     */
    public function getModel()
    {
        return Mage::getModel('catalog/category');
    }
}