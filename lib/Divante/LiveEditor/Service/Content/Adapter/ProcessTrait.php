<?php

/**
 * Class Divante_LiveEdit_Service_Content_Adapter_ProcessTrait
 */
trait Divante_LiveEdit_Service_Content_Adapter_ProcessTrait
{
    protected $contentAdapter;

    /**
     * @return Divante_LiveEditor_Service_Content_Interface
     */
    public function getContentAdapter()
    {
        if(! $this->contentAdapter) {
            $this->contentAdapter = Divante_LiveEditor_LiveEditor::getInstance()->getVersion() === 1
                ? new Divante_LiveEditor_Service_Content_Adapter_Magento1($this)
                : new Divante_LiveEditor_Service_Content_Adapter_Magento2($this);
        }
        return $this->contentAdapter;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->getContentAdapter()->getDescription();
    }


    /**
     * @param Divante_LiveEditor_Service_Content_Mapper $mapper
     */
    public function saveContent(Divante_LiveEditor_Service_Content_Mapper $mapper)
    {

        $this->getContentAdapter()->saveContent($mapper);

    }
}