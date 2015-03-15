<?php

/**
 * Interface Divante_LiveEditor_Service_MetadataInterface
 */
interface Divante_LiveEditor_Service_MetadataInterface
{

    /**
     * @return string
     */
    public function getMetaDescription();

    /**
     * @return mixed
     */
    public function getMetaKeywords();

    /**
     * @return mixed
     */
    public function getMetaTitle();

    /**
     * @return mixed
     */
    public function getUrlKey();

    /**
     * @param Divante_LiveEditor_Service_MetadataMapper $mapper
     * @return mixed
     */
    public function saveMetadata(Divante_LiveEditor_Service_MetadataMapper $mapper);
}