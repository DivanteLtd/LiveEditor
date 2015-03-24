<?php
abstract class Divante_LiveEditor_Service_Content_Adapter_DescriptionMapperAbstract
{
    /**
     * @param $model - Magento 1 or Magento 2 model
     * @return mixed
     */
    abstract public function getDescription($model);

    /**
     * @param $description
     * @param $model - Magento 1 or Magento 2 model
     * @return mixed
     */
    abstract public function setDescription($description, $model);
}