<?php
/**
 * Class Divante_LiveEditor_Service_Abstract
 */
abstract class Divante_LiveEditor_Service_Abstract
{
    protected $loadedModel;

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
        $this->loadedModel = $this->getModel()->load($id, $field);
        return $this;
    }

    /**
     * @return bool|Mage_Core_Model_Abstract
     */
    public function getLoadedModel()
    {
        return $this->loadedModel;
    }

    /**
     * @param $id
     * @param null $field
     * @return $this
     */
    public function load($id, $field = null)
    {
        $this->loadedModel = $this->getModel()->load($id, $field);
        return $this;
    }

    /**
     * @return bool|Mage_Core_Model_Abstract
     */
    public function getLoadedModel()
    {
        return $this->loadedModel;
    }

    /**
     * @return Mage_Core_Model_Abstract
     */
    abstract public function getModel();
}