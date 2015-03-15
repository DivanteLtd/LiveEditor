<?php

/**
 * Class Divante_LiveEdit_Service_MetadataAdapter_ProcessTrait
 */
trait Divante_LiveEdit_Service_MetadataAdapter_ProcessTrait
{
    protected $metadataAdapter;

    /**
     * @return Divante_LiveEditor_Service_MetadataAdapter_Magento1|Divante_LiveEditor_Service_MetadataAdapter_Magento2
     */
    public function getMetadataAdapter()
    {
        if(! $this->metadataAdapter) {
            $this->metadataAdapter = Divante_LiveEditor_LiveEditor::getInstance()->getVersion() === 1
                ? new Divante_LiveEditor_Service_MetadataAdapter_Magento1($this)
                : new Divante_LiveEditor_Service_MetadataAdapter_Magento2($this);
        }
        return $this->metadataAdapter;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->getMetadataAdapter()->getMetaTitle();
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->getMetadataAdapter()->getMetaDescription();
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->getMetadataAdapter()->getMetaKeywords();
    }

    public function getUrlKey()
    {
        return $this->getMetadataAdapter()->getUrlKey();
    }

    /**
     * @param Divante_LiveEditor_Service_MetadataMapper $mapper
     */
    public function saveMetadata(Divante_LiveEditor_Service_MetadataMapper $mapper)
    {

        $this->getMetadataAdapter()->saveMetadata($mapper);

    }
}