<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 18:03
 */
class Divante_LiveEditor_Service_MetadataAdapter_Magento1 implements Divante_LiveEditor_Service_MetadataInterface
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
        return $this->getModel()->getMetaDescription();
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->getModel()->getMetaKeywords();
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->getModel()->getMetaTitle();
    }

    /**
     * @param $title
     * @param $description
     * @param $keywords
     * @return mixed
     */
    public function saveMetadata($title, $description, $keywords)
    {
        $this->getModel()
            ->setMetaTitle((string) $title)
            ->setMetaDescription((string) $description)
            ->setMetaKeywords((string) $keywords)
        ;
        return $this;
    }


}