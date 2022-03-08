<?php

namespace App;

class Order
{
    public string $userId;
    public string $productId;
    public string $shippingAddress;
    public string $shippingPincode;
    public string $quantity;
    public string $totalAmount;

    public function __construct($userId, $productId, $shippingAddress, $shippingPincode, $quantity, $totalAmount)
    {
        $this->userId = $userId;
        $this->productId = $productId;
        $this->shippingAddress = $shippingAddress;
        $this->shippingPincode = $shippingPincode;
        $this->quantity = $quantity;
        $this->totalAmount = $totalAmount;
    }
    public function placeOrder()
    {

        DB::getInstance()->exec("INSERT INTO Orders (userId, productId, shipping_address, shipping_pincode, quantity, total_amount) VALUES ('$this->userId', '$this->productId' ,'$this->shippingAddress','$this->shippingPincode','$this->quantity', '$this->totalAmount')");
        return "success";
    }

    public function deleteOrder($orderId)
    {
        $sql = DB::getInstance()->prepare(
            "Delete from Orders where orderId = '$orderId'"
        );
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        return 'delete';
    }

    public function approveOrder($orderId)
    {
        $sql = "UPDATE Orders SET status =? where orderId = '$orderId'";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute(['Approved']);
        return $orderId;
    }

    public function pendingOrder($orderId)
    {
        DB::getInstance()->exec(
            "UPDATE Orders SET status = 'pending' where orderId = '$orderId'"
        );
        return $orderId;
    }

    public function getAllOrders()
    {
        $sql = DB::getInstance()->prepare('Select * from Orders');
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        $html = "<div class='table-responsive'>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th scope='col'>Order ID</th>
              <th scope='col'>User ID</th>
              
              <th scope='col'>Product ID</th>
              <th scope='col'>Status</th>
              <th scope='col'>Shipping Address</th>
              <th scope='col'>Shipping Pincode</th>
              <th scope='col'>Order Date</th>
              <th scope='col'>Delivery Date</th>
              <th scope='col'>Quantity</th>
              <th scope='col'>Total Amount</th>
              <th scope='col'>Action</th>
            </tr>
          </thead>
          <tbody>";
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            // print_r($v);
            $html .= "<tr id='$v[orderId]'>
            <td>$v[orderId]</td>
            <td>$v[userId]</td>
            <td>$v[productId]</td>
            <td>$v[status]</td>
            <td>$v[shipping_address]</td>
            <td>$v[shipping_pincode]</td>
            <td>$v[order_date]</td>
            <td>$v[delivery_date]</td>
            <td>$v[quantity]</td>
            <td>$v[total_amount]</td>
            <td>
            <button class='border-0 btn' name='orderId' value='$v[orderId]' id='delete' data-orderid ='$v[orderId]'>Delete</button> ";
            if ($v['status'] == 'pending') {
                $html .= "<button class='border-0 btn text-light ps-3 pe-3' name='orderId' value='$v[orderId]' style='background-color:deepskyblue;'  id='status$v[orderId]' data-sta data-status='$v[status]' data-orderid ='$v[orderId]'>Approve</button> </td>
          </tr>";
            } else {
                $html .= "<button class='border-0 btn  text-light ps-3 pe-3' name='orderId' style='background-color:tomato;'  value='$v[orderId]' id='status$v[orderId]' data-status='$v[status]' data-orderid ='$v[orderId]'>Pending</button> </td>";
            }
        }

        $html .= "</tr>
        </tbody>
      </table>
    </div>";
        return $html;
    }
}
