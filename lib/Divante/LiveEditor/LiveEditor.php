<?php

/**
 * Base LiveEditor class
 *
 * @package LiveEditor
 * @author Divante
 *
 * Class LiveEditor
 */
class Divante_LiveEditor_LiveEditor {

    public $version;
    protected static $instance;

    /**
     * @return int
     */
    protected function _determineVersion()
    {
        /*
            TODO:
            get magento version
        */

        $version = 1;
        return $version;
    }

    /**
     * @param int $version
     *
     * @return $this
     */
    protected function _setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    protected function __construct(){
        if(!$this->version){
            $this->_setVersion($this->_determineVersion());
        }
    }

    /**
     * @return Divante_LiveEditor_LiveEditor
     */
    public static function getInstance()
    {
        if(! self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @TODO Add singleton and id filter
     */

    /**
     * @return Divante_LiveEditor_Service_Product
     */
    public function getProduct()
    {
        return new Divante_LiveEditor_Service_Product();
    }

    /**
     * @return Divante_LiveEditor_Service_Cms_Block
     */
    public function getCmsBlock()
    {
        return new Divante_LiveEditor_Service_Cms_Block();
    }

    /**
     * @return Divante_LiveEditor_Service_Cms_Page
     */
    public function getCmsPage()
    {
        return new Divante_LiveEditor_Service_Cms_Page();
    }

    /**
     * @return Divante_LiveEditor_Service_Category
     */
    public function getCategory()
    {
        return new Divante_LiveEditor_Service_Category();
    }

} 