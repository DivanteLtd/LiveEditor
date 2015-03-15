<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 18:03
 */
class Divante_LiveEditor_Service_MetadataAdapter_Magento1
    extends Divante_LiveEditor_Service_MetadataAdapter_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
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
    public function getMetaDescription()
    {
        return $this->getModel()->getLoadedModel()->getMetaDescription();
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->getModel()->getLoadedModel()->getMetaKeywords();
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->getModel()->getLoadedModel()->getMetaTitle();
    }

    /**
     * @return mixed
     */
    public function getUrlKey()
    {
        return $this->getUrlKeyMapper()->getUrlKey($this->getModel()->getLoadedModel());
    }

    /**
     * @param $title
     * @param $description
     * @param $keywords
     * @return mixed
     */
    public function saveMetadata(Divante_LiveEditor_Service_MetadataMapper $mapper)
    {
        $model = $this->getModel();
        $isCatalogModel = ($model instanceof Divante_LiveEditor_Service_Product
            || $model instanceof Divante_LiveEditor_Service_Category);

        $model->getLoadedModel()
            ->setMetaTitle($mapper->getMetaTitle())
            ->setMetaDescription($mapper->getMetaDescription())
            ->setMetaKeywords($mapper->getMetaKeywords())
        ;

        if($isCatalogModel) {
            $model->setStoreId($mapper->getStoreId());
        }

        $this->getUrlKeyMapper()->setUrlKey($mapper->getUrlKey(), $model->getLoadedModel());

        $statusMapper = $this->getStatusMapper();
        ((bool) $mapper->getStatus())
            ? $statusMapper->setIsEnabled($model->getLoadedModel())
            : $statusMapper->setIsDisabled($model->getLoadedModel());

        $model->getLoadedModel()->save();

        if($isCatalogModel) {
            $model->reindexCatalogUrl();
        }

        return $this;
    }


}