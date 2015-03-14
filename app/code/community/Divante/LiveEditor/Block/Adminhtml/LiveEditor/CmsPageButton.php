<?php

/**
 * Class Divante_LiveEditor_Block_Adminhtml_LiveEditor_CmsPageButton
 */
class Divante_LiveEditor_Block_Adminhtml_LiveEditor_CmsPageButton extends Mage_Adminhtml_Block_Widget_Button
{

    /**
     * Block construct, setting data for button, getting current product
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setData(array(
            'label'    => Mage::helper('divante_liveeditor')->__('Live Edit'),
            'onclick'  => 'window.open(\'http://google.com\')',
            'disabled' => !$this->_isVisible(),
            'title'    => (!$this->_isVisible()) ?
                Mage::helper('divante_liveeditor')->__('CMS Page is not visible on frontend') :
                Mage::helper('divante_liveeditor')->__('Live Edit')
        ));
    }

    /**
     * Checking product visibility
     *
     * @return bool
     */
    private function _isVisible()
    {
        return true;
    }
}