<?php

/**
 * Class Divante_LiveEditor_Controller_ActionRenderer_Json
 */
class Divante_LiveEditor_Controller_ActionRenderer_Json
{
    /**
     * @param array $data
     * @return string
     *
     * @TODO process json encoder using magento version
     */
    public function renderJsonFromArray(array $data)
    {
        return Zend_Json::encode($data);
    }

}