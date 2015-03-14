<?php

/**
 * Class Divante_LiveEditor_Block_Cms_Page_Edit
 */
class Divante_LiveEditor_Block_Cms_Page_Edit extends Mage_Adminhtml_Block_Cms_Page_Edit {

    /**
     * Getter of url for "EditLive" button
     *
     * @return string
     */
    protected function _getEditLiveButton()
    {
        return $this->_getPageUrl();
    }

    /**
     * @param $pageId
     * @return string
     */
    protected function _getPageUrl(){
        $currentPageId = $this->getRequest()->getParam('page_id');
        return Mage::helper('cms/page')->getPageUrl((int) $currentPageId);
    }

    /**
     * Initialize cms page edit block
     *
     * @return void
     */
    public function __construct()
    {
        //Live Editor Configuration
        $config = Mage::helper('divante_liveeditor')->getConfig();

        $this->_objectId   = 'page_id';
        $this->_controller = 'cms_page';

        parent::__construct();

        if(isset($config['enabled']) && ($config['enabled'] == 1)){
            $this->_addButton('editlive', array(
                'label'     => Mage::helper('adminhtml')->__('Edit Live!'),
                'onclick'   => 'window.location.href = \''.$this->_getEditLiveButton().'\'',
                'class'     => 'save',
            ), 10);
        }

        if ($this->_isAllowedAction('save')) {
            $this->_updateButton('save', 'label', Mage::helper('cms')->__('Save Page'));
            $this->_addButton('saveandcontinue', array(
                'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
                'onclick'   => 'saveAndContinueEdit(\''.$this->_getSaveAndContinueUrl().'\')',
                'class'     => 'save',
            ), -100);
        } else {
            $this->_removeButton('save');
        }

        if ($this->_isAllowedAction('delete')) {
            $this->_updateButton('delete', 'label', Mage::helper('cms')->__('Delete Page'));
        } else {
            $this->_removeButton('delete');
        }
    }

}