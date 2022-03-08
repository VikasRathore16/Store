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
}
