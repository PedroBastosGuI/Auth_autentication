<?php

namespace App\Interfaces;

interface OrderRepositoryInterface
{
    public function getAllOrder();
    public function getOrderById($orderId);
    public function deleteOrder($orderId);
    public function createOrder(array $orderDetails);
    public function updateOrder($orderId, array $orderDetails);
    public function getFulFilledOrders();
}
