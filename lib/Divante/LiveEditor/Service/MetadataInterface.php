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
}