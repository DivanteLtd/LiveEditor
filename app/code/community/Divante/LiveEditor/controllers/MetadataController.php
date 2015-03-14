<?php

/**
 * Class Divante_LiveEditor_MetadataController
 */
class Divante_LiveEditor_MetadataController extends Mage_Core_Controller_Front_Action
{

    public function saveAction()
    {
        $request = $this->getRequest();

        $model = Divante_LiveEditor_LiveEditor::getInstance()
            ->getGlobalModel($request->getParam('referer_action'));

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $error = '';
        if($request->isPost() && $model instanceof Divante_LiveEditor_Service_MetadataInterface) {
            try {
                $model->saveMetadata(Divante_LiveEditor_Service_MetadataMapper::factory($request->getPost()));
            } catch (Exception $e) {
                Mage::logException($e);
                $error = $e->getMessage();
            }
        }
        $this->getResponse()->setBody(Zend_Json::encode(array(
            'status' => (bool) $error ? 'error' : 'success',
            'message' => $error
        )));
    }

    public function viewAction()
    {
        $request = $this->getRequest();

        $model = Divante_LiveEditor_LiveEditor::getInstance()
            ->getGlobalModel($request->getParam('referer_action'));

        if(!$model instanceof Divante_LiveEditor_Service_MetadataInterface) {
            $model = new Divante_LiveEditor_Service_MetadataSample();
        }

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Divante_LiveEditor_Controller_Action_Renderer_Json::getMetadataJson($model));
    }

}