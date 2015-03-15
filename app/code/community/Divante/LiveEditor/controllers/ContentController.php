<?php

/**
 * Class Divante_LiveEditor_ContentController
 */
class Divante_LiveEditor_ContentController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        $request = $this->getRequest();

        $model = Divante_LiveEditor_LiveEditor::getInstance()
            ->getGlobalModel($request->getParam('referer_action'),  true);

        if(!$model instanceof Divante_LiveEditor_Service_Content_Interface) {
            $model = new Divante_LiveEditor_Service_Content_Sample();
        }

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Divante_LiveEditor_Controller_Action_Renderer_Json::getContentJson($model));
    }

    public function saveAction()
    {
        $request = $this->getRequest();

        $model = Divante_LiveEditor_LiveEditor::getInstance()
            ->getGlobalModel($request->getParam('referer_action'));

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $error = '';
        if($request->isPost() && $model instanceof Divante_LiveEditor_Service_Content_Interface) {
            try {
                $model->saveContent(Divante_LiveEditor_Service_Content_Mapper::factory($request->getPost()));
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
}