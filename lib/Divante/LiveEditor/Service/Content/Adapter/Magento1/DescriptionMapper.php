<?php

/**
 * Class Divante_LiveEditor_Service_Content_Adapter_Magento1_DescriptionMapper
 */
class Divante_LiveEditor_Service_Content_Adapter_Magento1_DescriptionMapper
    extends Divante_LiveEditor_Service_Content_Adapter_DescriptionMapperAbstract
{
    /**
     * @param $model - Magento 1 or Magento 2 model
     * @return string
     */
    public function getDescription($model)
    {
        if(! $model instanceof Mage_Core_Model_Abstract) {
            return '';
        }

        return $model instanceof Mage_Cms_Model_Page ? $model->getContent() : $model->getDescription();
    }

    /**
     * @param $description
     * @param $model - Magento 1 or Magento 2 model
     * @return mixed
     */
    public function setDescription($description, $model)
    {
        switch(true) {
            case ($model instanceof Mage_Catalog_Model_Product):
            case ($model instanceof Mage_Catalog_Model_Category):
                /** @var Mage_Catalog_Model_Product $model */
                $model->setDescription($description);
                break;
            case ($model instanceof Mage_Cms_Model_Page):
                /** @var Mage_Cms_Model_Page $model */
                $model->setContent($description);
                break;
        }
        return $this;
    }

}