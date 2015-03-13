<?php

/**
 * Base LiveEditor class
 *
 * @package LiveEditor
 * @author Divante
 *
 * Class LiveEditor
 */
class LiveEditor {

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
     * @return LiveEditor
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

} 