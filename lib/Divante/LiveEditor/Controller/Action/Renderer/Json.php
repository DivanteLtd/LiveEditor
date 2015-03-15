<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 16:26
 */
class Divante_LiveEditor_Controller_Action_Renderer_Json extends Divante_LiveEditor_Controller_Action_Renderer_Abstract
{

    /**
     * @param Divante_LiveEditor_Service_MetadataInterface $model
     * @return string
     *
     * @TODO add support for Zend Framework 2
     */
    public static function getMetadataJson(Divante_LiveEditor_Service_MetadataInterface $model)
    {
        $json = array(
            'meta_description' => $model->getMetaDescription(),
            'meta_keywords' => $model->getMetaKeywords(),
            'meta_title' => $model->getMetaTitle(),
            'url_key' => $model->getUrlKey()
        );

        return Zend_Json::encode($json);
    }

    /**
     * @param Divante_LiveEditor_Service_Content_Interface $model
     * @return string
     *
     * @TODO add support for Zend Framework 2
     */
    public static function getContentJson(Divante_LiveEditor_Service_Content_Interface $model)
    {
        $json = array(
            'description' => $model->getDescription()
        );

        return Zend_Json::encode($json);
    }

    /**
     * @TODO add support for Zend Framework 2
     *
     * @param $string
     *
     * @return string
     */
    public static function getStringJson($string)
    {
        return Zend_Json::encode($string);
    }

}