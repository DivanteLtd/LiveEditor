<?php
/**
 * Class Divante_LiveEditor_Service_MetadataAdapter_Magento1_StatusMapper
 */
class Divante_LiveEditor_Service_MetadataAdapter_Magento1_StatusMapper
    extends Divante_LiveEditor_Service_MetadataAdapter_StatusMapperAbstract
{
    /**
     * @return mixed
     */
    public function setIsEnabled($model)
    {
        $this->setStatus($model, true);
        return $this;
    }

    /**
     * @return mixed
     */
    public function setIsDisabled($model)
    {
        $this->setStatus($model, true);
        return $this;
    }

    protected function setStatus($model, $flag)
    {
        switch(true) {
            case ($model instanceof Mage_Catalog_Model_Product):
                /** @var Mage_Catalog_Model_Product $model */
                $model->setStatus(
                    (bool) $flag
                    ? Mage_Catalog_Model_Product_Status::STATUS_ENABLED
                    : Mage_Catalog_Model_Product_Status::STATUS_DISABLED
                );
                break;
            case ($model instanceof Mage_Catalog_Model_Category):
                /** @var Mage_Catalog_Model_Category $model */
                $model->setIsActive((bool) $flag);
                break;
            case ($model instanceof Mage_Cms_Model_Page):
                /** @var Mage_Cms_Model_Page $model */
                $model->setIsActive((bool) $flag);
                break;
        }
        return $this;
    }


}