<?php

/**
 * Class Divante_LiveEditor_IndexController
 */
class Divante_LiveEditor_IndexController extends Mage_Core_Controller_Front_Action
{

    public function viewAction()
    {
        $request = $this->getRequest();

        if ('' === $request->getParam('referer_action') || '' === $request->getParam('id')) {
            return null;
        }

        $model = Divante_LiveEditor_LiveEditor::getInstance()
            ->getGlobalModel($request->getParam('referer_action'));

        $this->getResponse()
            ->setHeader('Content-type', 'application/json');
        $this->getResponse()
            ->setBody(Divante_LiveEditor_Controller_Action_Renderer_Json::getStringJson($model->getAdminUrl()));
    }

    public function logoutAction()
    {
        $logoutUrl = Mage::helper("adminhtml")->getUrl("adminhtml/index/logout");

        $this->getResponse()
            ->setHeader('Content-type', 'application/json');
        $this->getResponse()
            ->setBody(Divante_LiveEditor_Controller_Action_Renderer_Json::getStringJson($logoutUrl));
    }
}