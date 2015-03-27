<?php

/**
 * Base LiveEditor class
 *
 * @package LiveEditor
 * @author Divante
 *
 * Class LiveEditor
 */
class Divante_LiveEditor_LiveEditor
{

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

    protected function __construct()
    {
        if (!$this->version) {
            $this->_setVersion($this->_determineVersion());
        }
    }

    /**
     * @return Divante_LiveEditor_LiveEditor
     */
    public static function getInstance()
    {
        if (!self::$instance) {
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

    /**
     * @return Divante_LiveEditor_Service_Abstract|null
     */
    public function getGlobalModel($action = null, $readonly = false)
    {
        $request = Mage::app()->getRequest();

        if (null === $action) {
            $action = $this->getActionIdentifier();
        }

        switch ($action) {
            case 'catalog_category_view':
                $model = $this->getCategory()->load($request->getParam('id'), null, $readonly);
                break;
            case 'catalog_product_view':
                $model = $this->getProduct()->load($request->getParam('id'), null, $readonly);
                break;
            case 'cms_page_view':
                $model = $this->getCmsPage()->load($request->getParam('id'), null, $readonly);
                break;
            default:
                $model = null;
        }

        return $model;
    }

    /**
     * @return string
     */
    public function getActionIdentifier()
    {
        $request = Mage::app()->getRequest();
        return ($request->getModuleName() . '_' . $request->getControllerName() . '_' . $request->getActionName());
    }

    /**
     * @return Divante_LiveEditor_Service_Configuration
     */
    public function getConfiguration()
    {
        return new Divante_LiveEditor_Service_Configuration();
    }

    /**
     * @param string $param
     *
     * @return string
     */
    public function getActionParam($param)
    {
        $request = Mage::app()->getRequest();

        return $request->getParam($param);
    }

    /**
     * @param string|null $controller
     * @param string|null $action
     *
     * @return string
     */
    public function getAdminSecretKey($controller = null, $action = null)
    {
        $switchSessionName = 'adminhtml';
        $currentSessionId = Mage::getSingleton('core/session')->getSessionId();
        $currentSessionName = Mage::getSingleton('core/session')->getSessionName();
        $salt = null;
        if ($currentSessionId && $currentSessionName && isset($_COOKIE[$currentSessionName])) {
            $switchSessionId = $_COOKIE[$switchSessionName];
            $this->_switchSession($switchSessionName, $switchSessionId);
            $salt = $_SESSION['core']['_form_key'];
            $this->_switchSession($currentSessionName, $currentSessionId);
        }

        $secret = $controller . $action . $salt;

        return Mage::helper('core')->getHash($secret);
    }

    /**
     * @param string $namespace
     * @param int|null $id
     */
    protected function _switchSession($namespace, $id = null) {
        session_write_close();
        $GLOBALS['_SESSION'] = null;
        $session = Mage::getSingleton('core/session');
        if ($id) {
            $session->setSessionId($id);
        }
        $session->start($namespace);
    }


} 