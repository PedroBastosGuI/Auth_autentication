<?php

namespace App\Repository;

use App\Interfaces\OrderRepositoryInterface;
use App\Model\Order;

class OrderRepository implements OrderRepositoryInterface{
    public function getAllOrder(){
        return Order::all();
    }

    public function getOrderById($orderId){
        return Order::findOrFail($orderId);
    }
    public function deleteOrder($orderId){
        Order::destroy($orderId);
    }
    public function createOrder(array $orderDetails){
        return Order::create($orderDetails);
    }
    public function updateOrder($order, array $orderDetails){
        return Order::whereId($order)->update($newDetails);
    }
    public function getFulFilledOrders(){
        return Order::where('is_fulfilled', true);
    }
}
