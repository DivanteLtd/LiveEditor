<?php

/**
 * Class Divante_LiveEditor_Service_Configuration
 */
class Divante_LiveEditor_Service_Configuration extends Divante_LiveEditor_Service_Abstract
{
    /**
     * @var Mage_Core_Model_Config
     */
    private $_configuration;

    /**
     * @TODO differentiate between magento 1.x and magento 2.x
     */
    protected function _initializeConfiguration()
    {
        $this->_configuration = Mage::getConfig();
    }

    /**
     * @return Mage_Core_Model_Config
     *
     */
    public function getModel()
    {
        if (null === $this->_configuration) {
            $this->_initializeConfiguration();
        }

        return $this->_configuration;
    }

    /**
     * @TODO differentiate between magento 1.x and magento 2.x
     *
     * @param string|null $path
     * @param string $scope
     * @param string|null $scopeCode
     *
     * @return Mage_Core_Model_Config_Element
     */
    public function getNode($path = null, $scope = '', $scopeCode = null)
    {
        return $this->getModel()->getNode($path, $scope, $scopeCode);
    }
}