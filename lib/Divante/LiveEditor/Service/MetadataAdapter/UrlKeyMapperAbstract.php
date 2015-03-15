<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-15
 * Time: 10:43
 */
abstract class Divante_LiveEditor_Service_MetadataAdapter_UrlKeyMapperAbstract
{

    /**
     * @param $value
     * @param $model - Magento 1 or Magento 2 model
     * @return mixed
     */
    abstract public function setUrlKey($value, $model);

    /**
     * @param $model - Magento 1 or Magento 2 model
     * @return mixed
     */
    abstract public function getUrlKey($model);

}