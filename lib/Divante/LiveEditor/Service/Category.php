<?php
/**
 * Class Divante_LiveEditor_Service_Category
 */
include_once 'MetadataAdapter/ProcessTrait.php';

class Divante_LiveEditor_Service_Category
    extends Divante_LiveEditor_Service_Abstract
    implements Divante_LiveEditor_Service_MetadataInterface
{
    use Divante_LiveEdit_Service_MetadataAdapter_ProcessTrait;

    /**
     * @return Mage_Catalog_Model_Category
     *
     * @TODO add magento 2 support
     */
    public function getModel()
    {
        return Mage::getModel('catalog/category');
    }

    /**
     * @return string
     */
    public function getAdminUrl()
    {
        $secretKey = Divante_LiveEditor_LiveEditor::getInstance()->getAdminSecretKey('catalog_category', 'index');

        return Mage::helper("adminhtml")
            ->getUrl("adminhtml/catalog_category/index", array(
                'id' => $this->getLoadedModel()->getId(),
                'clear' => 1,
                'key' => $secretKey
            ));
    }
}