<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 17:44
 */
class Divante_LiveEditor_Service_MetadataSample implements Divante_LiveEditor_Service_MetadataInterface
{
    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return '';
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return '';
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return '';
    }

    /**
     * @param $title
     * @param $description
     * @param $keywords
     * @return mixed
     */
    public function saveMetadata($title, $description, $keywords)
    {
        return $this;
    }


}