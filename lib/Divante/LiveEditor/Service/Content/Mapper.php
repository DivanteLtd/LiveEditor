<?php

/**
 * Class Divante_LiveEditor_Service_Content_Mapper
 */
class Divante_LiveEditor_Service_Content_Mapper extends Divante_LiveEditor_Service_MapperAbstract
{
    protected $description, $store_id;

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->store_id;
    }

    /**
     * @param $store_id
     * @return $this
     */
    public function setStoreId($store_id)
    {
        $this->store_id = $store_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
