<?php

/**
 * Class Divante_LiveEditor_MetadataController
 */
class Divante_LiveEditor_MetadataController extends Mage_Core_Controller_Front_Action
{

    public function saveAction()
    {
        $service = Divante_LiveEditor_LiveEditor::getInstance()->getProduct();
        $service->saveProductUrlKey('top2', 421);
    }

    public function viewAction()
    {
//        $this->getResponse()->setHeader('Content-type', 'application/json');
//        $this->getResponse()->setBody(Zend_Json::encode(array(
//            'test' => 5
//        )));
    }

}