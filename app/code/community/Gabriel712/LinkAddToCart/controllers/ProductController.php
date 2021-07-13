<?php
class Gabriel712_LinkAddToCart_ProductController extends Mage_Core_Controller_Front_Action
{
    public function addAction()
    {
        $cart = Mage::getSingleton('checkout/cart')->init();

        $many_sku = $this->getRequest()->getParam('sku');
        $singles_sku = explode("#", $many_sku);

        foreach ($singles_sku as $sku) {
          $product = Mage::getModel('catalog/product')->loadByAttribute('sku', $sku);
          $cart->addProduct($product->getId());
        }
        $cart->save();

        $this->_redirect('checkout/cart');

    }
}
