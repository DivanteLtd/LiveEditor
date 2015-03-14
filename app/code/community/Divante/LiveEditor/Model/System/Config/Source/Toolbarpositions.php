<?php

/**
 * Class Divante_LiveEditor_Model_System_Config_Source_Toolbarpositions
 */
class Divante_LiveEditor_Model_System_Config_Source_Toolbarpositions extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    /**
     * @return array
     */
    public function getAllOptions(){
        if (!$this->_options) {
            $this->_options = array(
                array(
                    'value' => '',
                    'label' => '',
                ),
                array(
                    'value' => '1',
                    'label' => 'Top',
                ),
                array(
                    'value' => '2',
                    'label' => 'Bottom',
                ),
                array(
                    'value' => '3',
                    'label' => 'Left',
                ),
                array(
                    'value' => '4',
                    'label' => 'Right',
                )
            );
        }
        return $this->_options;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getAllOptions();
    }

}