<?php
/**
 * Class Divante_LiveEditor_Service_Abstract
 */
abstract class Divante_LiveEditor_Service_Abstract
{
    protected $loadedModel;
    /**
     * @var int
     */
    protected $_origStoreId;

    /**
     * @return mixed
     *
     */
    public function getVersion()
    {
        return Divante_LiveEditor_LiveEditor::getInstance()->getVersion();
    }

    /**
     * @param $id
     * @param null $field
     * @return $this
     */
    public function load($id, $field = null)
    {
        $this->_setAdminStore();
        $this->loadedModel = $this->getModel()->load($id, $field);

        return $this;
    }

    /**
     * @return int
     */
    public function getOrigStoreId()
    {
        return $this->_origStoreId;
    }

    /**
     * @param int $origStoreId
     */
    public function setOrigStoreId($origStoreId)
    {
        $this->_origStoreId = $origStoreId;
    }

    /**
     * @return bool|Mage_Core_Model_Abstract
     */
    public function getLoadedModel()
    {
        return $this->loadedModel;
    }

    /**
     * Reindex catalog_url indexer for single product
     * @TODO differentiate between magento 1.x and magento 2.x
     */
    public function reindexCatalogUrl()
    {
        $object = $this->getLoadedModel();
        $event = Mage::getSingleton('index/indexer')->logEvent(
            $object,
            $object->getResource()->getType(),
            Mage_Index_Model_Event::TYPE_SAVE,
            false
        );

        Mage::getSingleton('index/indexer')
            ->getProcessByCode('catalog_url')
            ->setMode(Mage_Index_Model_Process::MODE_REAL_TIME)
            ->processEvent($event);
    }

    protected function _setAdminStore()
    {
        $this->setOrigStoreId(Mage::app()->getStore()->getId());
        Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
    }

    protected function _setFrontStore()
    {
        Mage::app()->setCurrentStore($this->getOrigStoreId());
    }

    /**
     * @return Mage_Core_Model_Abstract
     */
    abstract public function getModel();
}