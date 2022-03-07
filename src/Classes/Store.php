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
            new \RecursiveArrayIterator($getQuery->fetchAll())
            as $k => $v
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

    public function header($username='',$login = 'Login')
    {
        $html = "<header>
        <nav class='navbar navbar-expand-sm'>
        <div class='container'>
            <a class='navbar-brand' href='../index.php'>
                CEDCOSS
            </a>
            <ul class='navbar-nav m-2' style='font-weight: bold'>
              ";
        if ($login == 'Login') {
            $html .= " <li class='nav-item  mx-2'>
                      <a class='nav-link  text-dark' href='../admin/index.php'>$login</a>
                    </li>";
        }
        else{
          $html .= " <li class='nav-item  mx-2'>
          <a class='nav-link  text-dark' href='../admin/Signout.php'>$username Signout</a>
        </li>";
        }
        $html.="
                <li class='nav-item dropdown mx-2'>
                    <a class='nav-link dropdown-toggle text-dark'>Elements</a>
                </li>
                <li class='nav-item dropdown mx-2'>
                    <a class='nav-link text-dark'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                            class='bi bi-cart' viewBox='0 0 16 16'>
                            <path
                                d='M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
                        </svg>
                    </a>
                </li>
                <li class='nav-item dropdown mx-2'>
                    <a class='nav-link text-dark'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                            class='bi bi-search' viewBox='0 0 16 16'>
                            <path
                                d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z' />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
      </header>";

      return $html;
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
