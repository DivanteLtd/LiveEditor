<?php
/**
 * Created by PhpStorm.
 * User: Wiktor Kaczorowski
 * Date: 2015-03-13
 * Time: 19:46
 */ 
class Divante_LiveEditor_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * Get Live Editor Config
     *
     * @return array
     */
    public function getConfig(){

        $config = array(
            'enabled'           => Mage::getConfig()->getNode('default/divante_liveeditor/basic/enabled'),
            'toolbarenabled'    => Mage::getConfig()->getNode('default/divante_liveeditor/basic/toolbarenabled'),
            'positiontoolbar'   => Mage::getConfig()->getNode('default/divante_liveeditor/basic/positiontoolbar'),
            'inactiveelements'  => Mage::getConfig()->getNode('default/divante_liveeditor/advanced/inactiveelements')
        );

        return $config;
    }

}