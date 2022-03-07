<?php

namespace App;

class Product
{
    public int $productSalePrice;
    public int $productCostPrice;
    public string $productName;
    public string $productImage;
    public string $productCategory;

    public function __construct(
        $productName,
        $productImage,
        $productCategory,
        $productSalePrice,
        $productCostPrice
    ) {
        // $this->productId = $productId;
        $this->productName = $productName;
        $this->productImage = $productImage;
        $this->productCategory = $productCategory;
        $this->productSalePrice = $productSalePrice;
        $this->productCostPrice = $productCostPrice;
    }

    public function addProduct()
    {
        DB::getInstance()
            ->exec("INSERT INTO Products (productName, productImage, productCategory, productSalePrice, productCostPrice) 
       VALUES ('$this->productName', '$this->productImage' ,'$this->productCategory','$this->productSalePrice','$this->productCostPrice')");
    }

    public function deleteProduct($productId)
    {
        $sql = DB::getInstance()->prepare(
            "Delete from Products where productId = '$productId'"
        );
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        return 'delete';
    }

    public function getAllProducts()
    {
        $sql = DB::getInstance()->prepare('Select * from Products');
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        $html = "<div class='table-responsive'>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th scope='col'>Product ID</th>
              <th scope='col'>Product Name</th>
              
              <th scope='col'>Product Image</th>
              <th scope='col'>Product Category</th>
              <th scope='col'>Product Sale Price</th>
              <th scope='col'>Product Cost Price</th>
              <th scope='col'>Action</th>
            </tr>
          </thead>
          <tbody>";
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            // print_r($v);
            $html .= "<tr id='$v[productId]'>
            <td>$v[productId]</td>
            <td>$v[productName]</td>
            <td><img src='../assests/productsImages/$v[productImage]' style='width:80px;height:80px'></td>
            <td>$v[productCategory]</td>
            <td>$v[productSalePrice]</td>
            <td>$v[productCostPrice]</td>
            <td><button class='border-0 btn' name='productId' value='$v[productId]' id='edit' data-productid ='$v[productId]' >Edit </button>
            <button class='border-0 btn' name='productId' value='$v[productId]' id='delete' data-productid ='$v[productId]'>Delete</button> ";
            //   if ($v['status'] == "Restricted") {
            //     $html .= "<button class='border-0 btn text-light ps-3 pe-3' name='userId' value='$v[userId]' style='background-color:deepskyblue;'  id='status$v[userId]' data-sta data-status='$v[status]' data-userid ='$v[userId]'>Approve</button> </td>
            //       </tr>";
            //   } else {
            //     $html .= "<button class='border-0 btn  text-light ps-3 pe-3' name='userId' style='background-color:tomato;'  value='$v[userId]' id='status$v[userId]' data-status='$v[status]' data-userid ='$v[userId]'>Restrict</button> </td>";
            //   }
        }

        $html .= "</tr>
        </tbody>
      </table>
    </div>";
        return $html;
    }

    public function getProduct($id)
    {
        $sql = DB::getInstance()->prepare("Select * from Products where productId ='$id' ");
        $sql->execute();
        $result = $sql->setFetchMode(\PDO::FETCH_ASSOC);
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            return $v;
        }
    }

  
}
