<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-15
 * Time: 13:03
 */
class Divante_LiveEditor_Service_Content_Adapter_Magento1
    extends Divante_LiveEditor_Service_Content_Adapter_Abstract
    implements Divante_LiveEditor_Service_Content_Interface
{
    /**
     * @var Divante_LiveEditor_Service_Abstract
     */
    protected $model;

    public function __construct(Divante_LiveEditor_Service_Abstract $model)
    {
        $this->model = $model;
    }

    /**
     * @return Divante_LiveEditor_Service_Abstract
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getDescriptionMapper()->getDescription($this->getModel()->getLoadedModel());
    }

    /**
     * @param Divante_LiveEditor_Service_Content_Mapper $mapper
     * @return mixed
     */
    public function saveContent(Divante_LiveEditor_Service_Content_Mapper $mapper)
    {

        $model = $this->getModel();
        $isCatalogModel = ($model instanceof Divante_LiveEditor_Service_Product
            || $model instanceof Divante_LiveEditor_Service_Category);

        if($isCatalogModel) {
            $model->getLoadedModel()->setStoreId($mapper->getStoreId());
        }

        $this->getDescriptionMapper()
            ->setDescription($mapper->getDescription(), $model->getLoadedModel());
        $model->getLoadedModel()->save();

        if($isCatalogModel) {
            $model->reindexCatalogUrl();
        }

        return $this;
    }


}