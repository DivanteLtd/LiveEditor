<?php
/**
 * Class Divante_LiveEditor_Service_Cms_Block
 */
class Divante_LiveEditor_Service_Cms_Block extends Divante_LiveEditor_Service_Abstract
{
    /**
     * @return Mage_Core_Model_Abstract
     *
     * @TODO add magento 2 support
     */
    public function getModel()
    {
        return Mage::getModel('cms/block');
    }

}