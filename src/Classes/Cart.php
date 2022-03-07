<?php

namespace App;

error_reporting(0);
/**
 * Cart class
 */
class Cart
{
    public $cart;

    /**
     * constructor function
     */

    public function __construct()
    {
        $this->cart = [];
    }

    /**
     * addToCart function
     * Adding Products in Cart array with Quantity
     * @param Product $product
     * @return void
     */
    public function addToCart($product)
    {
        if (!$this->isExistsProduct($product)) {
            $product['quantity'] = 1;
            array_push($this->cart, $product);
        }
    }

    /**
     * isExistsProduct function
     *Checking if product exists or not
     * If exists then increase the qunatity  by one of that product
     * @param Product $product
     * @return boolean
     */

    public function isExistsProduct($product)
    {
        foreach ($this->cart as $key => $p) {
            if ($p['productId'] == $product['productId']) {
                $this->cart[$key]['quantity'] += 1;
                return true;
            }
        }
        return false;
    }

    /**
     * setCart function
     * Declaring $_Session['cartItems] array to cart
     * @param [type] $carrt
     * @return void
     */
    public function setCart($carrt)
    {
        $this->cart = $carrt;
    }

    /**
     * Undocumented function
     *return cart array
     * @return void
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * displayCart function
     *
     * @return void
     */
    function displayCart()
    {
        $total = 0;

        $html = "<table class='table'>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>";
        foreach ($this->cart as $key => $product) {
            $total += $product['quantity'] * $product['productSalePrice'];
            // print_r($product);
            $html .=
                "<tr>
            <td>$product[productName]</td>
            <td>$ $product[productSalePrice]</td>
            <td>
                <input type='text' class='w-20' id='update$product[productId]' data-quantity='$product[quantity]' value='$product[quantity]'>
                <button class='btn btn-secondary border-0' id='update' data-product_id=$product[productId]>Update</button>
                <button class='btn btn-danger border-0' id='Remove' data-product_id=$product[productId]>Remove</button>
            </td>
            <td>$" .
                $product['quantity'] * $product['productSalePrice'] .
                "</td>
        </tr>";
        }
        $html .= "
        <tfoot>
            <tr>
                <td colspan='4' class='text-end'>$ $total</td>
            </tr>
        </tfoot>
    </table>";
        echo $html;
    }


    
}
