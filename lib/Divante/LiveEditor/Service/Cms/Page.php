<?php

/**
 * Class Divante_LiveEditor_Service_Cms_Page
 */
class Divante_LiveEditor_Service_Cms_Page extends Divante_LiveEditor_Service_Abstract
{
    /**
     * @return Mage_Cms_Model_Page
     */
    public function getModel()
    {
        return Mage::getModel('cms/page');
    }

}