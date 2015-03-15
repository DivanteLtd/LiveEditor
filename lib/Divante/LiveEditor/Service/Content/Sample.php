<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-15
 * Time: 12:55
 */
class Divante_LiveEditor_Service_Content_Sample implements Divante_LiveEditor_Service_Content_Interface
{
    /**
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * @param Divante_LiveEditor_Service_Content_Mapper $mapper
     * @return mixed
     */
    public function saveContent(Divante_LiveEditor_Service_Content_Mapper $mapper)
    {
        return $this;
    }

}