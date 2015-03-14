<?php

/**
 * Class Divante_LiveEditor_Model_System_Config_Source_Elements
 */
class Divante_LiveEditor_Model_System_Config_Source_Elements extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
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
                    'label' => 'Categories',
                ),
                array(
                    'value' => '2',
                    'label' => 'Products',
                ),
                array(
                    'value' => '3',
                    'label' => 'Static CMS Blocks',
                ),
                array(
                    'value' => '4',
                    'label' => 'Static Cms Pages',
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