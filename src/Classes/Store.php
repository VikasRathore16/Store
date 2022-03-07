<?php

namespace App;

class Store extends Product
{
    public function __construct()
    {
    }

    public function pagination($page_number = 1)
    {
        $sql = DB::getInstance()->prepare('Select * from Products');
        $sql->execute();
        $total_rows = $sql->rowCount();
        $limit = 2;
        $initial_page = ($page_number - 1) * $limit;
        $total_pages = ceil($total_rows / $limit);
        $getQuery = DB::getInstance()->prepare(
            'SELECT *FROM Products LIMIT ' . $initial_page . ',' . $limit
        );
        $getQuery->execute();
        $result = $getQuery->setFetchMode(\PDO::FETCH_ASSOC);

        $html = "<div class='zigzag-bottom'></div>
        <div class='container'>
            <div class='row'>";
        foreach (
            new \RecursiveArrayIterator($getQuery->fetchAll()) as $k => $v
        ) {
            // echo '<br>';
            // print_r($v);
            // echo '<br>';

            // print_r($v);
            $html .= "<div class='col-md-3 col-sm-6'>
           <div class='single-shop-product'>
               <div class='product-upper' >
                   <img src='../assests/productsImages/$v[productImage]' alt='' >
               </div>
               <h2><a href='Store/single-product.php?productId=$v[productId]&productName=$v[productName]'>$v[productName]</a></h2>
               <div class='product-carousel-price'>
                   <ins>$$v[productSalePrice]</ins> <del>$$v[productCostPrice]</del>
               </div>

               <div class='product-option-shop'>
                   <a class='add_to_cart_button' id='addToCart' data-quantity='1' data-product_sku='' data-product_id='$v[productId]' rel='nofollow'>Add to cart</a>
               </div>
           </div>
       </div>";
        }
        $html .= "</div>
      </div>";
        echo $html;

        $page = " <div class='col'>
      <nav aria-label='Page navigation example'>
          <ul class='pagination'>";
        for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
            $page .=
                " <li class='page-item'><a class='page-link' href = index.php?page=" .
                $page_number .
                " > $page_number</a></li>";
        }
        $page .= " </ul>
      </nav>
  </div>";
        echo $page;
    }

    public function getStore()
    {
        $sql = DB::getInstance()->prepare('Select * from Products');
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);

        $html = "<div class='zigzag-bottom'></div>
        <div class='container'>
            <div class='row'>";
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            // print_r($v);
            $html .= "<div class='col-md-3 col-sm-6'>
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
        $html .= "</div>
            </div>";
        return $html;
    }

    public function getSearch($parameter)
    {
        $sql = DB::getInstance()->prepare(
            "Select * from Products where productId='$parameter' or productName LIKE '$parameter%'"
        );
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        $html = "<div class='zigzag-bottom'></div>
        <div class='container'>
            <div class='row'>";
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            print_r($v);
            $html .= "<div class='col-md-3 col-sm-6'>
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
        $html .= "</div>
        </div>";
        return $html;
    }

    public function header()
    {
        return "<header>
        <div class='bg-dark' id='navbarHeader'>
          <div class='container'>
            <div class='row'>
              <div class='col-sm-8 col-md-7 py-4'>
                <h4 class='text-white'><a href='../Store/cart.php'>Cart</a></h4>
                <p class='text-muted'>Cart is empty now.</p>
              </div>
              <div class='col-sm-4 offset-md-1 py-4'>
                <a href='../admin/Signout.php'> Signout </a>
                <a href='../admin/index.php'> Login </a>
              </div>
            </div>
          </div>
        </div>
        <div class='navbar navbar-dark bg-dark shadow-sm'>
          <div class='container'>
            <a href='../index.php' class='navbar-brand d-flex align-items-center'>
              <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' aria-hidden='true' class='me-2' viewBox='0 0 24 24'><path d='M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z'/><circle cx='12' cy='13' r='4'/></svg>
              <strong>SHOP</strong>
            </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarHeader' aria-controls='navbarHeader' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
          </div>
        </div>
      </header>";
    }

    public function footer()
    {
        return "<footer class='text-muted py-5 bg-dark'>
            <div class='container'>
              <p class='float-end mb-1'>
                <a href='#'>Back to top</a>
              </p>
              <p class='mb-1'>&copy; CEDCOSS Technologies</p>
            </div>
          </footer>";
    }

    public function SearchBar()
    {
        return "<div class='row container'>
        <div class='col-12 justify-content-end mt-5'>
          <form class='row row-cols-lg-auto align-items-center mt-0 mb-3' action='./Store/Search.php' method='get'>
            <div class='col-lg-6 col-12'>
              <label class='visually-hidden' for='inlineFormInputGroupUsername'>Search</label>
              <div class='input-group'>
                <input type='text' class='form-control' id='inlineFormInputGroupUsername' name='query' placeholder='Product, SKU, Category'>
              </div>
            </div>

            <div class='col-lg-3 col-12'>
              <label class='visually-hidden' for='inlineFormSelectPref'>Sort By</label>
              <select class='form-select' id='inlineFormSelectPref' name='sortby'>
                <option selected>Sort By</option>
                <option value='1'>Price</option>
                <option value='2'>Recently Added</option>
                <option value='3'>Popularity</option>
              </select>
            </div>

            <div class='col-lg-3 col-12'>
              <button type='submit' class='btn btn-primary w-100'>Search</button>
            </div>
        </div>
      </div>";
    }
    
}
