<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-15
 * Time: 12:52
 */
interface Divante_LiveEditor_Service_Content_Interface
{
    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param Divante_LiveEditor_Service_Content_Mapper $mapper
     * @return mixed
     */
    public function saveContent(Divante_LiveEditor_Service_Content_Mapper $mapper);
}