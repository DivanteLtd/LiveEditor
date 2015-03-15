<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2015-03-14
 * Time: 21:48
 */
class Divante_LiveEditor_Service_MetadataMapper
{
    protected $metaTitle, $metaDescription, $metaKeywords, $urlKey, $status, $store_id;

    /**
     * @param array $values
     * @return Divante_LiveEditor_Service_MetadataMapper
     */
    public static function factory(array $values)
    {
        $model = new self();

        foreach($values as $key => $value) {
            $methodName = 'set' . Zend_Filter::filterStatic($key, 'Word_UnderscoreToCamelCase');
            if(method_exists($model, $methodName)) {
                call_user_func(array($model, $methodName), $value);
            }
        }

        return $model;
    }

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->store_id;
    }

    /**
     * @param int $store_id
     */
    public function setStoreId($store_id)
    {
        $this->store_id = (int) $store_id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * @param $metaTitle
     * @return $this
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param $metaDescription
     * @return $this
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param $metaKeywords
     * @return $this
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlKey()
    {
        return $this->urlKey;
    }

    /**
     * @param $urlKey
     * @return $this
     */
    public function setUrlKey($urlKey)
    {
        $this->urlKey = $urlKey;
        return $this;
    }


}