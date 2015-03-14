<?php

/**
 * Class Divante_LiveEditor_Model_Observer
 */
class Divante_LiveEditor_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function addLiveEditButton(Varien_Event_Observer $observer)
    {
        /** @var Mage_Adminhtml_Block_Template $block */
        $block = $observer->getBlock();
        /** @var string $type */
        $type = $block->getType();

        switch ($type) {
            case 'adminhtml/catalog_product_edit':
                $this->addProductButton($block);
                break;
            case 'adminhtml/catalog_category_edit':
                $this->addCategoryButton($block);
                break;
            case 'adminhtml/cms_page_edit':
                $this->addCmsPageButton($block);
                break;
            default:
                break;
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Template $block
     */
    private function addProductButton($block)
    {
        $deleteButton = $block->getChild('delete_button');
        $block->setChild('product_liveedit_button',
            $block->getLayout()->createBlock('divante_liveeditor/adminhtml_liveEditor_productButton')
        );
        $deleteButton->setBeforeHtml($block->getChild('product_liveedit_button')->toHtml());
    }

    /**
     * @param Mage_Adminhtml_Block_Template $block
     */
    private function addCategoryButton($block)
    {
        $deleteButton = $block->getChild('reset_button');
        $block->setChild('category_liveedit_button',
            $block->getLayout()->createBlock('divante_liveeditor/adminhtml_liveEditor_categoryButton')
        );
        $deleteButton->setBeforeHtml($block->getChild('category_liveedit_button')->toHtml());
    }

    /**
     * @param Mage_Adminhtml_Block_Template $block
     */
    private function addCmsPageButton($block)
    {
        $deleteButton = $block->getChild('delete_button');
        $block->setChild('cmspage_liveedit_button',
            $block->getLayout()->createBlock('divante_liveeditor/adminhtml_liveEditor_cmsPageButton')
        );
        $deleteButton->setBeforeHtml($block->getChild('cmspage_liveedit_button')->toHtml());

    }

    /**
     * @param Varien_Event_Observer $observer
     */
    public function renderBlock(Varien_Event_Observer $observer)
    {
        /** @var $block Mage_Core_Block_Abstract */
        $block = $observer->getEvent()->getBlock();
        $type = $block->getType();
        $alias = $block->getBlockAlias();

        switch ($alias) {
            case 'cms.wrapper':
                $elementClass = $block->getElementClass() . ' liveedit';
                $block->setElementClass($elementClass);
                break;
            default:
                break;
        }
    }

    /**
     * @param Varien_Event_Observer $observer
     */
    public function renderProductDescription(Varien_Event_Observer $observer)
    {
        /** @var Divante_LiveEditor_LiveEditor $liveEditor */
        $liveEditor = Divante_LiveEditor_LiveEditor::getInstance();
        if ($liveEditor->getActionIdentifier() == 'catalog_product_view') {
            /** @var Mage_Catalog_Model_Product $product */
            $product = $observer->getEvent()->getProduct();
            $oldDescription = $product->getDescription();
            if (null === $product->getMetaDescription()) {
                $product->setMetaDescription($oldDescription);
            }
            $newDescription = '<div class="liveedit">' . $oldDescription . '</div>';
            $product->setDescription($newDescription);
        }
    }
}