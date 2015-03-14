<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 18:22
 *
 * @TODO implement all interface mathods
 */

/**
 * Class Divante_LiveEditor_Service_MetadataAdapter_Magento1
 */
class Divante_LiveEditor_Service_MetadataAdapter_Magento2 implements Divante_LiveEditor_Service_MetadataInterface
{
    /**
     * @return string
     */
    public function getMetaDescription()
    {
        // TODO: Implement getMetaDescription() method.
        return '';
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        // TODO: Implement getMetaKeywords() method.
        return '';
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        // TODO: Implement getMetaTitle() method.
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
        // TODO: Implement saveMetadata() method.
        return $this;
    }

}