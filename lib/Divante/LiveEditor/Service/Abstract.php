<?php
/**
 * Class Divante_LiveEditor_Service_Abstract
 */
abstract class Divante_LiveEditor_Service_Abstract
{

    /**
     * @return mixed
     *
     */
    public function getVersion()
    {
        return Divante_LiveEditor_LiveEditor::getInstance()->getVersion();
    }

    /**
     * @return Mage_Core_Model_Abstract
     */
    abstract public function getModel();
}