<?php

/**
 * Class Divante_LiveEditor_Helper_Config
 */
class Divante_LiveEditor_Helper_Config extends Mage_Core_Helper_Abstract
{
    /**
     * @var array
     */
    private $_config;

    private function _initializeConfig()
    {
        $liveEditorConfig = Divante_LiveEditor_LiveEditor::getInstance()->getConfiguration();
        $this->_config = array(
            'enabled'          => $liveEditorConfig->getNode('default/divante_liveeditor/basic/enabled'),
            'toolbarenabled'   => $liveEditorConfig->getNode('default/divante_liveeditor/basic/toolbarenabled'),
            'positiontoolbar'  => $liveEditorConfig->getNode('default/divante_liveeditor/basic/positiontoolbar'),
            'inactiveelements' => $liveEditorConfig->getNode('default/divante_liveeditor/advanced/inactiveelements')
        );
    }

    /**
     * Get Live Editor Config
     *
     * @return array
     */
    public function getConfig()
    {
        if (null === $this->_config) {
            $this->_initializeConfig();
        }

        return $this->_config;
    }

}