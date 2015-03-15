<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-15
 * Time: 10:46
 */
class Divante_LiveEditor_Service_MetadataAdapter_Magento1_UrlKeyMapper
    extends Divante_LiveEditor_Service_MetadataAdapter_UrlKeyMapperAbstract
{
    /**
     * @param $value
     * @param $model
     * @return $this
     */
    public function setUrlKey($value, $model)
    {
        if($model instanceof Mage_Cms_Model_Page) {
            $model->setIdentifier($value);
        } else {
            $model->setUrlKey($value);
        }

        return $this;
    }

}