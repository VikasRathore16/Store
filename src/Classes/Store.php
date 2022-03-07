<?php
namespace App;

class Store extends Product{
    public function __construct()
    {
        
    }

    public function getStore(){
        $sql = DB::getInstance()->prepare("Select * from Products");
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);

        $html ="<div class='zigzag-bottom'></div>
        <div class='container'>
            <div class='row'>";
            foreach ((new \RecursiveArrayIterator($sql->fetchAll())) as $k => $v) {
                // print_r($v);
                $html.="<div class='col-md-3 col-sm-6'>
                <div class='single-shop-product'>
                    <div class='product-upper' >
                        <img src='../assests/productsImages/$v[productImage]' alt='' >
                    </div>
                    <h2><a href='Store/single-product.php?productId=$v[productId]&productName=$v[productName]'>$v[productName]</a></h2>
                    <div class='product-carousel-price'>
                        <ins>$$v[productSalePrice]</ins> <del>$$v[productCostPrice]</del>
                    </div>  
                    
                    <div class='product-option-shop'>
                        <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='$v[productId]' rel='nofollow' href='/canvas/shop/?add-to-cart=70'>Add to cart</a>
                    </div>                       
                </div>
            </div>";
            }
            $html.="</div>
            </div>";
            return $html;
    }

    public function getSearch($parameter){
        $sql = DB::getInstance()->prepare("Select * from Products where productId='$parameter' or productName LIKE '$parameter%'");
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        $html ="<div class='zigzag-bottom'></div>
        <div class='container'>
            <div class='row'>";
        foreach ((new \RecursiveArrayIterator($sql->fetchAll())) as $k => $v) {
              print_r($v);
              $html.="<div class='col-md-3 col-sm-6'>
              <div class='single-shop-product'>
                  <div class='product-upper' >
                      <img src='../assests/productsImages/$v[productImage]' alt='' >
                  </div>
                  <h2><a href='Store/single-product.php?productId=$v[productId]&productName=$v[productName]'>$v[productName]</a></h2>
                  <div class='product-carousel-price'>
                      <ins>$$v[productSalePrice]</ins> <del>$$v[productCostPrice]</del>
                  </div>  
                  
                  <div class='product-option-shop'>
                      <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='$v[productId]' rel='nofollow' href='/canvas/shop/?add-to-cart=70'>Add to cart</a>
                  </div>                       
              </div>
          </div>";
        }
        $html.="</div>
        </div>";
        return $html;
        
    }
}

?>