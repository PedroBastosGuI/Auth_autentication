<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


use App\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function __construct(OrderRepositoryInterface $orderInterface){
        $this->orderInterface = $orderInterface;
    }


    public function index():JsonResponse
    {
        //
        return response()->json([
            'data' => $this->orderInterface->getAllOrder(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $orderDetails = $request->only([
            'client',
            'details'
        ]);


        return response()->json([
            'data' => $this->orderRepository->createOrder($orderDetails)
        ],
            Response::HTTP_CREATED
    );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->orderRepository->getOrderById($orderId)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
        $orderId = $request->route('id');
        $orderDetails = $request->only([
            'client',
            'details'
        ]);

        return response() -> json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $orderId = $request->route('id');
        $this->orderRepository->deleteOrder($orderId);

        return reponse()->json(null, Response::HTTP_OK);
    }
}
