<?php

/**
 * Class Divante_LiveEditor_CategoryController
 */
class Divante_LiveEditor_CategoryController extends Mage_Core_Controller_Front_Action
{

    public function viewAction()
    {
        $id = $this->getRequest()->getParam('id');
        $category = Divante_LiveEditor_LiveEditor::getInstance()->getCategory();
        $category->getModel()->load($id);

    }

}