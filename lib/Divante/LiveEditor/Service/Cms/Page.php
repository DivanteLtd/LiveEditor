<?php

/**
 * Class Divante_LiveEditor_Service_Cms_Page
 */
class Divante_LiveEditor_Service_Cms_Page
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
{
    /**
     * @return Mage_Cms_Model_Page
*/
    public function getModel()
    {
        return Mage::getModel('cms/page');
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        // TODO: Implement getMetaDescription() method.
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        // TODO: Implement getMetaKeywords() method.
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        // TODO: Implement getMetaTitle() method.
    }


}